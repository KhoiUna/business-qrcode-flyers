# Introduction pdf_from_html_generator

## Instructions:

1. `git clone https://github.com/UntilityMonitor-io/pdf_from_html_generator`
2. `cd pdf_from_html_generator`
3. `npm i` then `pip install -r requirements.txt`
4. Create `.env` file based on `sample.env` with your env variables
5. `mkdir img pdf` to create `/img` & `/pdf` folder
6. Run `./shot.sh` to run `node screenshot.js` which captures webpage and save them as a `.png` image
7. Run `./pdf.sh` to convert all `.png` files in `/img` folder to `.pdf` and save in `/pdf` folder
