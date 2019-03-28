from mbed_cloud import ConnectAPI
import time

POPUP_IOT_RESOURCE = "/5555/0/6666"
dev = "0169b3690b5a00000000000100100054"


def _main():
    api = ConnectAPI()
    api.start_notifications()

    while True:
        try:
            async_resp = api.get_resource_value_async(dev, POPUP_IOT_RESOURCE)
            while not async_resp.is_done:
                time.sleep(0.5)

            if async_resp.error:
                print("async_resp.error\n")
                continue

            value = async_resp.value
            print("Current value: %r" % (value,))
        except(mbed_cloud.exceptions.CloudApiException):
            printf("mbed_cloud.exceptions.CloudApiException\n");
            continue;

if __name__ == "__main__":

