import mysql.connector
from dotenv import load_dotenv
import os

load_dotenv('./.env')


def get_business_names():
    mydb = mysql.connector.connect(
        host=os.environ.get('host'),
        user=os.environ.get('user'),
        password=os.environ.get('password'),
        database=os.environ.get('database')
    )

    mycursor = mydb.cursor()

    mycursor.execute("SELECT business_name FROM BBE_Vendors;")

    myresult = mycursor.fetchall()

    business_names_list = []
    for x in myresult:
        business_names_list.append(x[0])

    return business_names_list


urls = ["http://localhost/businessQrFlyers?business-name=" +
        i for i in get_business_names()]

print(urls)
