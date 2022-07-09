require("dotenv").config();
const puppeteer = require("puppeteer");
const mysql = require("mysql");

const screenshot = async (url, index) => {
  const browser = await puppeteer.launch({});
  const page = await browser.newPage();

  await page.setViewport({
    width: 595,
    height: 842,
    deviceScaleFactor: 1,
  });

  const maxTimeOut = 60000; // 1 minute
  page.setDefaultTimeout(maxTimeOut);
  page.setDefaultNavigationTimeout(maxTimeOut);
  await page.waitForTimeout(maxTimeOut);

  await page.goto(url, {
    waitUntil: "networkidle2", //make sure to wait until webpage finishes loading
  });

  // const fileName = new URL(url).hostname;
  const fileName = index;

  // Screenshot & save to img folder as png
  await page.screenshot({
    path: __dirname + `/img/${fileName}.png`,
    fullPage: true,
  });

  // Create pdf
  // await page.pdf({
  //   path: __dirname + `/pdf/${fileName}.pdf`,
  //   format: "a4",
  //   printBackground: true,
  // });

  await browser.close();
};

const main = () => {
  const { host, user, password, database } = process.env;
  const con = mysql.createConnection({
    host,
    user,
    password,
    database,
  });

  con.connect((err) => {
    if (err) throw err;

    let urls = [];
    con.query(
      "SELECT business_name FROM BBE_Vendors",
      async (err, results, fields) => {
        if (err) throw err;

        // const baseURL = "http://localhost/businessQrFlyers";
        const baseURL =
          "https://fiber.utilitymonitor.io/php/khoi/businessQrFlyers";

        results.forEach((element, index) => {
          urls.push(`${baseURL}?index=${index + 1}`);
        });

        urls.forEach(async (url, index) => {
          screenshot(url, index + 1);
        });
      }
    );
  });
};
main();
