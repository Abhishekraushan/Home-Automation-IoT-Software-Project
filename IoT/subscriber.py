import paho.mqtt.client as mqtt

# This is the Subscriber

import json 
from ast import literal_eval

def on_connect(client, userdata, flags, rc):
  print("Connected with result code "+str(rc))
  client.subscribe("topic/test")

def on_message(client, userdata, msg):
  if msg.payload.decode():
    dic = eval(msg.payload.decode())
    print(dic['temp']," ",dic['doorbell']," ",dic['smartGarage']," ",dic['intensity'])
    
    fh = open("value.txt", "a") 
    fh.write(str(dic['temp'])+" "+str(dic['doorbell'])+" "+str(dic['smartGarage'])+" "+str(dic['intensity'])+"\n") 
    fh.close
     
    fw = open("temp.txt", "w") 
    fw.write(str(dic['temp'])+" "+str(dic['doorbell'])+" "+str(dic['smartGarage'])+" "+str(dic['intensity'])) 
    fw.close
     
  else: 
    print("No!")  
    client.disconnect()
 
print("hi")    
client = mqtt.Client()
print("hi") 
client.connect("192.168.43.54",1883,60)
print("hi") 

client.on_connect = on_connect
print("hi") 
client.on_message = on_message

client.loop_forever()
