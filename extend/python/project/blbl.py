import jieba
from matplotlib import pyplot as plt
from wordcloud import WordCloud
import csv
import requests
from bs4 import BeautifulSoup
import sys
import os


# model construction

#crawl bullet commend and generate a txt file
gpus = sys.argv[1]
with open('/Users/qianzhuang/Desktop/project/BC.txt','w',encoding='utf-8')as f:

    firstpage='https://api.bilibili.com/x/v1/dm/list.so?oid='+gpus
    html=requests.get(firstpage)
    html.encoding='utf-8'

    soup=BeautifulSoup(html.content, 'html.parser')

    for link in soup.findAll('d'):
        # print(link.text)
        f.write(link.text+"\n")

#import txt files
import string
temp = ""
with open('/Users/qianzhuang/Desktop/project/BC.txt','r',encoding='utf-8')as f:
    temp += f.read()
sentence =""
for element in temp:
    sentence+=element

#print(sentence)
sentence=sentence.replace("\n",'')
for punctuation in string.punctuation:
    print(punctuation)

#clean data
sentence = sentence.replace("。","")
sentence = sentence.replace("，","")
sentence = sentence.replace("！","")
sentence = sentence.replace("？","")
sentence = sentence.replace(".","")
sentence = sentence.replace("~","")
sentence = sentence.replace(" ","")
sentence = sentence.replace("/","")
sentence = sentence.replace("……","")
sentence = sentence.replace("”","")
sentence = sentence.replace("“","")
sentence = sentence.replace("：","")
sentence = sentence.replace("哈","")

# segment
seg_list = jieba.cut(sentence, cut_all=True, HMM=True)
total_words = " ".join(seg_list)
print(total_words)

# sentiment analysis 情感分析
file= open("/Users/qianzhuang/Desktop/project/dut_sentiment_words.csv",'r')
dictionary = csv.reader(file)
words_in_dict=[]
for row in dictionary:
    words_in_dict.append(row[0])
senti_words_in_sentence=[]
for word in total_words.split():
    print(word)
    if word in words_in_dict:
        senti_words_in_sentence.append(word)
print("length"+str(len(senti_words_in_sentence)))
file.close()
# compare with the senti_words in dict
# 拿到情感辞典里对应的情感类别和情感强度
file= open("/Users/qianzhuang/Desktop/project/dut_sentiment_words.csv",'r')
dictionary = csv.reader(file)
txt=open("/Users/qianzhuang/Desktop/project/words.txt",'w')

for row in dictionary:
    # see all the words in dict
    # print(row[0])
    if row[0] in senti_words_in_sentence:
        txt.write(row[0]+" "+row[1] + " " + row[4] + " " + row[5]+ " "+row[6] +"\n")
file.close()

file= open("/Users/qianzhuang/Desktop/project/dut_sentiment_words.csv",'r')
dictionary = csv.reader(file)
txt = open("/Users/qianzhuang/Desktop/project/words_last2.txt", 'w')
for row in dictionary:
    if row[0] in senti_words_in_sentence:
        txt.write(row[5] + " " + row[6] + "\n")
file.close()

# generate word cloud
# 以下生成是词云
print(total_words)
total_word_list = ""
#create resource for making the word cloud
for word in total_words:
    total_word_list+=word+""
#make every word seperated by a space
wc = WordCloud( font_path="/Users/qianzhuang/Desktop/project/锐字真言体免费商用.ttf",# 如果是中文必须要添加这个，否则会显示成框框
               background_color='white',
               width=1000,
               height=800,
               ).generate(total_word_list)
wc.to_file('/Users/qianzhuang/PhpstormProjects/BILIBILI_WKU/public/static/img/WorldCloud.png')  # 保存图片
# plt.imshow(wc)  # 用plt显示图片
# plt.axis('off')  # 不显示坐标轴
# plt.show()  # 显示图片


os.system('open -a "/Applications/Google Chrome.app" "http://localhost:63342/BILIBILI_WKU/index/view/searchVideo.php?"')



