# Business QRcode Flyers

## Tech stack

- **Languages:** PHP, JavaScript, Python
- **Database:** MySQL
- Use this [QRCode API](https://goqr.me/api/doc/create-qr-code/) to fetch QR image.

## Story

- This is the project we did for the Black Business Expo. We are trying to create QR code flyers for the vendors so customers can scan and contact them.
- **Problem:** Having to manually design and create QR code flyers, then export them as PDF.
- **Solution:**
  - Use HTML and Bootstrap to design web pages.
  - Use PHP to generate websites with the QR code images on with QR code API to generate QR code linking to business contact forms.
  - Write JavaScript and Python script to screenshot web pages and generate PDFs so vendors can print them and put on their kiosks.

## Instructions using `pdf_from_html_generator`:

1. `cd pdf_from_html_generator`
2. `npm i` then `pip install -r requirements.txt`
3. Create `.env` file based on `sample.env` with your env variables
4. `mkdir img pdf` to create `/img` & `/pdf` folder
5. Run `./shot.sh` to run `node screenshot.js` which captures webpage and save them as a `.png` image
6. Run `./pdf.sh` to run Python code to convert all `.png` files in `/img` folder to `.pdf` and save in `/pdf` folder
