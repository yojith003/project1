from tabula import read_pdf
from tabula import convert_into
from PyPDF2 import PdfReader
import json
def conditions(string):
    string = string.upper()
    sems = ['I B.TECH I','I B.TECH II',\
            'II B.TECH I','II B.TECH II',\
            'III B.TECH I','III B.TECH II',\
            'IV B.TECH I','IV B.TECH II']
    months = ['JAN', 'FEB', 'MAR', \
              'APR', 'MAY', 'JUNE', 'JULY', \
              'AUG', 'SEP', 'OCT',\
              'NOV', 'DEC',\
              'January', 'February', 'March', \
              'April', 'May', 'June', 'July',\
              'August', 'September', 'October',\
              'November', 'December']
    ans = ['Result','','','']
    if ('Revaluation' in string):
        ans[0] = 'Revaluation'
    if('Regular' in string):
        ans[1] = 'Regular'
    else:
        ans[1] = 'Supply'

    #Month of the exam
    month = ''
    for m in range(len(months)):
        print(months[m].upper())
        if months[m].upper() in string:
            print("in the block",m)
            if(m<12):
                month = months[m].upper()
                mn = months[m+12].upper()
                print(month)
            else:
                month = months[m].upper()
    p = string.find(month)
    py = string[p:p+20].find('20')
    print("position",p,py)
    ans[3] = mn+' '+string[p+py:p+py+4]
    

    sem = ''
    for s in sems:
        if s in string:
            sem = s + ' Sem'
    ans[2] = sem
    print(string)
    return ans
    
array = []
filename = "resultfile.pdf"
reader = PdfReader(filename)
num_pages = len(reader.pages)
page = reader.pages[0]
text = page.extract_text()[0:200]
ExamDetails = conditions(text)
#print(ExamDetails)
print(json.dumps(ExamDetails))
