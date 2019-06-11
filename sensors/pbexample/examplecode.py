from pubnub.pnconfiguration import PNConfiguration
from pubnub.pubnub import PubNub
from pubnub.callbacks import SubscribeCallback

import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BOARD)
GPIO.setup(7,GPIO.OUT)
p = GPIO.PWM(7,50)
p.start(7.5)

pnconfig = PNConfiguration()

pnconfig.subscribe_key = 'sub-c-1c31c1b8-8bcb-11e9-9769-e24cdeae5ee1'
pnconfig.publish_key = 'pub-c-4872297c-41b7-4f68-ad26-ed2061493795'

pubnub = PubNub(pnconfig)

channel = 'pubnub_onboarding_channel'


class Listener(SubscribeCallback):
    def message(self, pubnub, message):
        if message.message == 'abrir':
            print('Abrir puerta')
            try:
                p.ChangeDutyCycle(12.5)
                time.sleep(.5)
            except KeyboardInterrupt:
                p.stop()
                GPIO.cleanup()
        elif message.message == 'cerrar':
            print('Cerrar Puerta')
            try:
                p.ChangeDutyCycle(7.5)
                time.sleep(.5)
            except KeyboardInterrupt:
                p.stop()
                GPIO.cleanup()

print('Listening...')
pubnub.add_listener(Listener())
pubnub.subscribe().channels(channel).execute()
