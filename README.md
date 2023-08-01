# QVR Meta
A php script that can runs on your QNAP NAS, or any places that can execute php scripts.
## Requirements
QNAP NAS with QVR Pro, or QVP over 2.0+
QVR server's Metadata must be enabled, in case you have no idea, [check this article](https://www.qnap.com/en/how-to/tutorial/article/how-to-record-qiot-suite-lite-data-in-qvr-pro).
## Overview
The QVR Pro is the NVR services provided by QNAP. It is capable to record videos from IP cameras, RTMP streams from different brands.
The script is origanally used to help someone that has demand to record the footages while packaging parcels by typing/scanning a serial number label and mark it in the QVR Pro's Metadata Vault.
In case the parcel receiver claims the item inside is incorrect, can use metadata to search the serial and locate the proper clip instead of searching through the whole recordings by time.
## Installation
If plan to use this on the same QNAP NAS, put the 3 php files (index, submit, update_url) under /Web/ share folder. Then access through your NAS's webpage.
Note: The URL of QTS and "Web" are different. Usually it is http://NAS_IP/ without port 8080.
After running it will generate an url.txt in the same folder to save the URL of metatadata vault's entry point.
Make sure the server you execute this script can establish a direct connection to QVR server.
