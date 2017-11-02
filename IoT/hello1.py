#!/usr/bin/env python3

import paho.mqtt.client as mqtt
import sys
# This is the Publisher

client = mqtt.Client()
client.connect("localhost",1883,60)

flag = ""
for i in range(1,len(sys.argv)):
	flag = flag+" "+sys.argv[i]
print(flag)
client.publish("topic/test", flag);
client.disconnect();
