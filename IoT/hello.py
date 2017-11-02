#!/usr/bin/env python3

import paho.mqtt.client as mqtt
import random
# This is the Publisher
import json
import sys
import time

import datetime

def Intensity():
        current_time = str(datetime.datetime.now()).split()[1].split(':')[2].split('.')[0]
        if(int(current_time)>=0 and int(current_time)<=15): # or
                return (60 + random.randint(0,20))
        elif (int(current_time)>15 and int(current_time)<=30):
                return (60 + random.randint(21,40))    
        elif (int(current_time)>30 and int(current_time)<=45): # or (int(current_time)>45 and int(current_time)<=60)):  
                return (60 - random.randint(0,30))
        elif (int(current_time)>45 and int(current_time)<=60):      
                return (60 - random.randint(31,60))

def temp(k):
    p =random.randint(0,1000)
    p = p*0.001;
   
    s = random.randint(0,1)
    time.sleep(1)
    if(s==0):
        print (s," ",k+p);
        return k+p
    elif(s==1):
        print (s," ",k-p)
        return k-p   
   

def bell():
  
    s = random.randint(0,100)
    #time.sleep(1)
    if(s<10):
       return 1
    else:
        return 0    
       
     
def smartGarage():
  
    s = random.randint(0,100)
    #time.sleep(1)
    if(s<9):
       return 1
    else:
        return 0      




def Publish(newTemp):
    tempData=temp(newTemp)
    bellData=bell()
    garageData=smartGarage()
    bulbData=Intensity()
   
    jsonData={}
    jsonData["temp"]=tempData
    jsonData["doorbell"]=bellData
    jsonData["smartGarage"]=garageData
    jsonData["intensity"]=bulbData
    #jsonToPython = json.dumps(jsonData)
    jsonToPython = str(jsonData)

    client = mqtt.Client()
    client.connect("localhost",1883,60)
    flag = ""
    for i in range(1,len(sys.argv)):
        flag = flag+" "+sys.argv[i]
    client.publish("topic/test", flag);
   #  print(sys.argv[1])
    client.disconnect();
    return tempData;

i = 0
initialTemp=50
initialBell=0
initialGarage=0

changeTemp = Publish(initialTemp)
#while 1:
changeTemp = Publish(changeTemp)
i += 1
#time.sleep(1)