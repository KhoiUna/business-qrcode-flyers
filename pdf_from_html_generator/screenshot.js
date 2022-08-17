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

  const maxTimeOut = 60000; // 2 minutes
  page.setDefaultTimeout(maxTimeOut);
  page.setDefaultNavigationTimeout(maxTimeOut);
  new Promise((r) => setTimeout(r, maxTimeOut));

  await page.goto(url, {
    waitUntil: "networkidle2", //make sure to wait until webpage finishes loading
  });

  const fileName = index;

  // Screenshot & save to img folder as png
  await page.screenshot({
    path: __dirname + `/img/${fileName}.png`,
    fullPage: true,
  });

  console.log("Screenshot is done!");

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
    console.log("Database connected!");

    let urls = [];
    con.query(
      "SELECT business_name FROM BBE_Vendors",
      async (err, results, fields) => {
        if (err) throw err;

        results.forEach((element, index) => {
          urls.push(`${process.env.base_url}?index=${index + 1}`);
        });

        urls.forEach(async (url, index) => {
          screenshot(url, index + 1);
        });
      }
    );
  });
};
main();
