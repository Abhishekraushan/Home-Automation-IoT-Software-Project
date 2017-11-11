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
    print(round(dic['temp'],1)," ",dic['doorbell']," ",dic['smartGarage']," ",dic['intensity'])
    
    # fh = open("myfile", "a") 
    # fh.write(str(dic['temp'])+" "+str(dic['doorbell'])+" "+str(dic['smartGarage'])+" "+str(dic['intensity'])+"\n") 
    # fh.close
     
    fw = open("myfile", "w") 
    fw.write(" "+str(dic['doorbell'])+" "+str(round(dic['temp'],1))+" "+str(int(dic['temp']))+" "+str(int(dic['temp']))+" "+str(dic['smartGarage'])+" "+str(dic['smartGarage'])+" "+str(dic['smartGarage']));
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
