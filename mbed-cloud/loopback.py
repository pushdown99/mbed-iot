from mbed_cloud import ConnectAPI
import time

POPUP_IOT_RESOURCE = "/5555/0/6666"
dev = "0169b3690b5a00000000000100100054";


def _main():
    api = ConnectAPI()
    api.delete_device_subscriptions(dev)
    api.update_webhook("https://www.tric.kr/heroku/mbed-iot/webhook/")
    time.sleep(1)
    api.add_resource_subscription(dev, POPUP_IOT_RESOURCE)

if __name__ == '__main__':
    _main()
