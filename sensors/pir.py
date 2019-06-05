import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BCM)
GPIO.setup(23, GPIO.IN)
GPIO.setup(24, GPIO.OUT)
try:
	time.sleep(.5)
	while True:
		print("holawas")
		if GPIO.input(23):
			GPIO.output(24,True)
			time.sleep(0.5) #Buzzer turns on for 0.5 sec
			GPIO.output(24, False)
			print("Achis achis los mariachis")
      			time.sleep(1) #to avoid multiple detections
		time.sleep(0.1) #loop delay, should be less than the detection delay
except KeyboardInterrupt:
    GPIO.cleanup()
