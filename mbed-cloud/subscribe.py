from mbed_cloud import ConnectAPI
import time

POPUP_IOT_RESOURCE = "/5555/0/6666"
dev = "0169a0a10ea00000000000010010005b"

def _main():
    api = ConnectAPI()
    api.start_notifications()
    devices = api.list_connected_devices().data
    if not devices:
        raise Exception("No connected devices registered. Aborting")

    value = api.get_resource_value(devices[0].id, POPUP_IOT_RESOURCE)
    queue = api.add_resource_subscription(devices[0].id, POPUP_IOT_RESOURCE)
    while True:
        print("Current value: %r" % (value,))
        value = queue.get(timeout=30)


if __name__ == "__main__":
    _main()
