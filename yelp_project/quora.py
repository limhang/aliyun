#!/usr/bin/python
# -*- coding: UTF-8 -*-
import requests
import json
from lxml import etree
import datetime 


output =open('caogao.m','a')

now = datetime.datetime.now()

# output.write('==========' + writeTime + '==========')
# output.write("\n") # 换行
r = requests.get('http://www.nikon.com.cn/microsite/beginnertutor/qa.html?pid=hp_navi_question')
html = etree.HTML(r.text)

result = html.xpath("//ul[@class='txt_list_01']")
# print(result)
# print(len(result))  


for num in range(1,len(result)):
    item = html.xpath("//ul[@class='txt_list_01'][%(num).d]/li"%{'num':num})
    print(len(item))
    for block in range(1,len(item)):
        title = html.xpath("//ul[@class='txt_list_01'][1]/li[2]/div[@class='title']/span[@class='txt']")
        output.write(title[0].text)
output.close()


# def getUserInfo(url):
#     r = requests.get(url,headers=headers)
#     html = etree.HTML(r.text)
#     for num in range(1,30):
        # div_class = "list_D03_%(info).2d"%{'info':num}
#         class_name = "//dl[contains(@id,\"%(info)s\")]"%{'info':div_class} 
#         result = html.xpath(class_name) # 与 result = html.xpath('//dl[contains(@id,"list_D03_01")]') 等同
#         # ====调试的时候使用====勿删====print(result[0].xpath('string(.)'))
        
#         #因为有些条数据没有span这个元素所以可以抓取错误。。。
#         try:
#             result_train_try = result[0].xpath('./dd[1]/div[1]/div[1]/span[1]')[0].text
#         # print(result_train_try)
#         except Exception as e:
#             result_train = '无'
#         else:
#             result_train = result_train_try

#         result_area = result[0].xpath('./dd[1]/div[2]/p[1]')[0].text
#         result_price = result[0].xpath('./dd[1]/div[3]/p[1]/span[1]')[0].text
#         result_price_ave = result[0].xpath('./dd[1]/div[3]/p[2]')[0].text
#         result_title = result[0].xpath('./dd[1]/p[3]/span[1]')[0].text

#         # print('名称：' + result_title + '---------' + result_area + '平方米' + result_price + '万' + result_train)
        
#         output.write('名称：' + result_title + '---------' + result_area + '平方米' + result_price + '万' + result_train + '========' + result_price_ave)
#         output.write("\n") # 换行


# for page in range(1,100):
#     url_1 = 'http://esf.wh.fang.com/house/i3'
#     url = url_1 + str(page) + '/'
#     getUserInfo(url)

# output.close()