from mbed_cloud import ConnectAPI
import time

BUTTON_RESOURCE = "/3304/0/5700"


def _main():
    api = ConnectAPI()
    devices = api.list_connected_devices().data
    if len(devices) == 0:
        raise Exception("No endpints registered. Aborting")
    # Delete device subscriptions
    api.delete_device_subscriptions(devices[0].id)
    # First register to webhook
    api.update_webhook("https://mbed-iot.herokuapp.com/webhook/")
    time.sleep(2)
    api.add_resource_subscription(devices[0].id, BUTTON_RESOURCE)

if __name__ == '__main__':
    _main()
