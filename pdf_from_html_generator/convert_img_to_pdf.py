from PIL import Image
from os import path, listdir

current_path = path.dirname(__file__)


def convert_img_to_pdf(img):
    src_path = current_path + '\\img' + '\\' + img
    image1 = Image.open(src_path)  # open image file at src_path

    im1 = image1.convert('RGB')

    pdf_name = img[: len(img) - 4]
    dst_path = current_path + '\\pdf' + '\\' + pdf_name + '.pdf'
    im1.save(dst_path)  # save pdf at dst_path


img_file_list = listdir(path.join(current_path, 'img'))

for img in img_file_list:
    convert_img_to_pdf(img)
