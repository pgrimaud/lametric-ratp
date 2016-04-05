# RATP Schedules for LaMetric

![LaMetric Ratp Index](https://raw.githubusercontent.com/pgrimaud/lametric-ratp/master/images/ratp.png)

# How it works ?

First, launch your LaMetric app, install our app "RATP Scheduled" and choose a line in the drop down menu.

![LaMetric Ratp App](https://raw.githubusercontent.com/pgrimaud/lametric-ratp/master/images/app.png)

Then, find the ID Destination and ID Station from the [API RATP](https://github.com/pgrimaud/horaires-ratp-api) or see our example below.


####Example : 

If you want to get the schedules of the next subway* to **Balard** at the station **Daumesnil**, on the line 8.

-	Open http://api-ratp.pierre-grimaud.fr/v2/metros/8, you will get : 

```
{
    "response": {
        "destinations": [
            {
                "id_destination": "22",
                "destination": "Pointe du Lac",
                "slug": "pointe+du+lac"
            },
            {
                "id_destination": "23",
                "destination": "Balard",
                "slug": "balard"
            }
        ],
        "stations": [
            ...
            {
                "id": "275",
                "name": "Daumesnil",
                "slug": "daumesnil"
            },
            ...
           }
        ]
    },
    "_meta": {
        "version": "2",
        "date": "2016-04-03T02:17:22+02:00",
        "call": "GET /metros/8"
    }
}
```

-	Find the ```id_destination``` of the desired destination (23 for **Balard**).

-	And find the ```id``` of the desired station (275 for **Daumesnil**).

- 	Set this numbers on LaMetric app, wait a few seconds and you will see :


![LaMetric Ratp Destination](https://raw.githubusercontent.com/pgrimaud/lametric-ratp/master/images/destination.png)
![LaMetric Ratp Schedule](https://raw.githubusercontent.com/pgrimaud/lametric-ratp/master/images/schedule.png)

*It also works with rer or tramway

## Feedback

If you need help, contact [create an issue](https://github.com/pgrimaud/lametric-ratp/issues) or contact us on [Twitter](http://twitter.com/nilzenx)