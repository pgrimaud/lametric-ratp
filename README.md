# RATP Schedules for LaMetric

![LaMetric Ratp Index](https://raw.githubusercontent.com/pgrimaud/lametric-ratp/master/images/ratp.png)

# 2017-06-16 - Important update

### Parameters data have changed, due to the change of middleware. You must reconfigure your app and follow the instructions bellow. Sorry for inconvenience. 

# How it works ?

First, launch your LaMetric app, install our app "RATP Schedules" and choose a line in the drop down menu.

![LaMetric Ratp App](https://raw.githubusercontent.com/pgrimaud/lametric-ratp/master/images/app.png)

Then, find the ID Destination and ID Station from the [API RATP](https://github.com/pgrimaud/horaires-ratp-api) or see our example below.

### Example : 

If you want to get the schedules of the next subway* to **Balard** at the station **Daumesnil**, on the line 8.

Open https://api-ratp.pierre-grimaud.fr/v3/destinations/metros/8, you will get : 

```
{
    "result": {
        "destinations": [
            {
                "name": "Pointe du Lac",
                "way": "A"
            },
            {
                "name": "Balard",
                "way": "R"
            }
        ]
    },
    "_metadata": {
        "call": "GET /destinations/metros/8",
        "date": "2017-06-16T01:24:58+02:00",
        "version": 3
    }
}
```

 - Find the ```way``` of the desired destination (R for **Balard**) and set it on the configuration panel.

 - Set the name of the station (daumesnil for **Daumesnil**).

 - Wait a few seconds and you will see :


![LaMetric Ratp Destination](https://raw.githubusercontent.com/pgrimaud/lametric-ratp/master/images/destination.png)
![LaMetric Ratp Schedule](https://raw.githubusercontent.com/pgrimaud/lametric-ratp/master/images/schedule.png)

*It also works with rer or tramway

## Feedback

If you need help, [create an issue](https://github.com/pgrimaud/lametric-ratp/issues) or contact us on [Twitter](http://twitter.com/pgrimaud_)
