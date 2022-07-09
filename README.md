# Business QRcode Flyers

- This is the project we did for the Black Business Expo. We are trying to create QRcode flyers for businesses so customers can scan and contact them.

- **Problem:** Having to manually create QRcode flyers for businesses, then export them as PDF.

- **Solution:**

  - Use PHP to generate websites with the QRcode images on with [QR code API](https://goqr.me/api/) to generate QRcode linking to business contact forms.
  - Use `pdf_from_html_generator` to screenshot the QRcode images and generate a PDF.

## Instructions using `pdf_from_html_generator`:

1. `cd pdf_from_html_generator`
2. `npm i` then `pip install -r requirements.txt`
3. Create `.env` file based on `sample.env` with your env variables
4. `mkdir img pdf` to create `/img` & `/pdf` folder
5. Run `./shot.sh` to run `node screenshot.js` which captures webpage and save them as a `.png` image
6. Run `./pdf.sh` to convert all `.png` files in `/img` folder to `.pdf` and save in `/pdf` folder
