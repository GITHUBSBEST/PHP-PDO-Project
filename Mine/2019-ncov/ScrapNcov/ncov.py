# -*- coding: utf-8 -*-
'''
# Created on Feb-21-20 09:30
# test.py
# @author: blue
'''
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.wait import WebDriverWait
import os
import pymysql
os.chdir(r'D:\Code\PYTHON\PythonProject')
url = "https://www.zhihu.com/special/19681091/trends"
driver = webdriver.Chrome()
wait = WebDriverWait(driver, 10)


def getText(url):
    driver.get(url)
    try:
        input = wait.until(EC.element_to_be_clickable(
            (By.CSS_SELECTOR, "#root > div.DetailPage-module-root-1yXJ > div.css-ovbogu > section:nth-child(4) > div.css-uxrhmg > div:nth-child(2) > table > tfoot > tr > td > button")))
        input.click()
        synopsis = wait.until(EC.presence_of_element_located(
            (By.CSS_SELECTOR, "#root > div.DetailPage-module-root-1yXJ > div.css-ovbogu > section:nth-child(4) > div.css-uxrhmg > div:nth-child(2) > table")))
        return synopsis.text
    except TimeoutError:
        return getText(url)


def storeText(text):
    try:
        with open('test.txt', 'a+')as t:
            if isinstance(text, list):
                for i in range(len(text)):
                    slope = text[i]
                    if isinstance(slope, (tuple, list)):
                        t.writelines(list(slope))
                    else:
                        t.writelines(slope)
            else:
                t.write(text)
            print('store successfully')
    except:
        print('fail to store')
    finally:
        t.close()


def storeData(data):
    immerse = pymysql.connect('localhost', 'root', '', 'mine')
    rim = immerse.cursor()
    # Database name can't contain _
    sql2 = "DELETE FROM ncov"
    sql3 = "alter table ncov AUTO_INCREMENT=1"
    sql = 'INSERT INTO ncov(province,total_num,now_num,dead_num,cure_num)VALUES(%s,%s,%s,%s,%s)'
    try:
        rim.execute(sql2)
        rim.execute(sql3)
        rim.executemany(sql, data)
        immerse.commit()
        print('achieve it')
    except:
        immerse.rollback()
        print('fail to store data')
    finally:
        immerse.close()


def processText(text):
    subsoil = []
    vapor = text.split('\n')
    vapor.pop(0)
    vapor.pop()
    for i in range(len(vapor)):
        shallow = vapor[i].split(' ')
        subsoil.append(tuple(shallow))
    return subsoil


if __name__ == "__main__":
    rise = getText(url)
    vapor = processText(rise)
    print(type(vapor))
    print(len(vapor))
    print(vapor)
    storeData(vapor)
    storeText(vapor)
    driver.close()
