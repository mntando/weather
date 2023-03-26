# WEATHER50
#### Description:
This is a simple weather app that displays the current weather and the next 24 hour forecast for a given location. The app is build using the [OpenWeatherMap API](https://openweathermap.org/api). It is written in Php using the Laravel framework and uses the Blade templating engine. The front end is written in HTML, CSS and JavaScript and uses the [Bootstrap](https://getbootstrap.com/docs/5.2/getting-started/introduction/) framework.

`web.php` contains the following functions:

- `/index`: This is the main function that renders the index.html page. It takes in the location as a query parameter and passes it to html page. The script then reads this `location` and makes a call to the `/weather` function to get the weather data. If location is equal to error, it means that the location was not found and the app will display an error message to the user by
rendering apology.html and passing the error message to the page.
- `/weather`: This function takes in the `location` as a query parameter and makes a call to the OpenWeatherMap API to get the current weather. It then returns the weather data as a JSON object.
- `/forecast`: This function also takes in the `location` as query parameter and makes a call to the OpenWeatherMap API to get the forecast for the next 24 hours with a 3 hour interval. It then returns the forecast data as a JSON object.
- `/locate`: This function takes in two arguments, `latitude` and `longitude`. It then makes a call to the OpenWeatherMap API to get the location name for the given latitude and longitude. It then returns the response as a JSON object.
- `/search`: This function takes in any number of characters as a query parameter, searches for the `location` name in the cities database and returns the results as a JSON object.

`script.js` (/static/script.js) contains the following main functions:

- The one function that is called when the page loads is the location function. This function is responsible for displaying the typed location name. I makes a call to the `/search` route and passes the typed characters as a query parameter. It then displays the results as a dropdown list.
- onInput: This function is called when the user types in the location input field. On click of the location, It calls the `/q` route and passes the typed location as a query parameter.
- display: This function is called when index.html is loaded. It reads the location from the page then the `/weather` route passing the location as a query parameter. If the results states that the location is not found, it submits to `/q` route passing location equal to `error`. This will then render the apology.html page and display the error message to the user. If the location is found, it will then make a call to the `/weather` route passing the location as a query parameter. From the results, it displays the current weather. The function then makes a call to the `/forecast` route also passing the location as a query parameter. It then displays the forecast for the next 24 hours with a 3 hour interval. It also contains a function that is called every second to update the current time. This function is called date. There is also a function timezone which ensures that when the `timezone` value is added to the UTC time, it returns the correct time for the location (this is because some locations have floating point values for the `timezone` and also after adding the `timezone` value to the UTC time, it may return a value greater than 23 or less than 0).
- locate: This function is called when the user clicks on the `Auto` button. It makes a call to the `/locate` route passing the `lattitude` and `longitude` as query parameters which returns the location name. It then redirects to `/q` route passing the location as a query parameter.

In the template folder, there are four html files:
- `index.html`: This is the main page of the app. It contains the current weather and the forecast for the next 24 hours.
- `apology.html`: This page is rendered when the location is not found. It displays an error message to the user.
- `layout.html`: This is the base template for the app. It contains the navbar, the location input field, auto button and the footer.
- `welcome.html`: This is the welcome page of the app. It contains a welcome message and from it you can navigate to the main page.

Other files:
- `requirements.txt` (/requirements.txt): This file contains the list of dependencies for the app.
- `cities.db` (/static/cities.db): This is the database that contains the list of cities.
- `README.md` (/README.md): This file contains the description of the app.

`style.css` (/static/style.css):
- This file contains the CSS for the app. It contains media queries for different screen sizes.
```
@media screen and (max-width: 600px) {
    .flex-container {
        overflow-x: scroll;
        ...
    }
}
```

- And also some properties for flexbox.
```
.flex-container > div {
    width: 10.5%;
    margin: 10px;
}
```

- There are other few classes that style the app, for example:
```
.rounded-corners
{
    border-radius: 25px;
    padding-inline: 2%;
}
```
- They are not so many, most of the styling come from the Boostrap library.

#### Features:
- Current weather
- 24 hour forecast
- Auto location detection
- Search for any location

#### Where to get:
You can find the live app [here](https://weather50.onrender.com), hosted on [Render](https://dashboard.render.com/), I use the free tier so it may take a few seconds to load.
