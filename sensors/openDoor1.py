#!/usr/bin/env python
# encoding: utf-8
import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BOARD)
GPIO.setup(7,GPIO.OUT)
p = GPIO.PWM(7,50)
p.start(7.5)
print ("hallo")
try:
	p.ChangeDutyCycle(12.5)
	time.sleep(.5)
	# p.ChangeDutyCycle(12.5)
	# time.sleep(.5)
	print("Sí se pudo gg")
        GPIO.cleanup()
	#p.ChangeDutyCycle(7.5)
	#time.sleep(1)
	#p.ChangeDutyCycle(12.5)
	#time.sleep(1)
	#p.ChangeDutyCycle(2.5)
	#time.sleep(1)
except KeyboardInterrupt:
	p.stop()
	GPIO.cleanup()
