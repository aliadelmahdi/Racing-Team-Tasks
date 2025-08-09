
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Vehicle Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #111111; 
            color: white;
            text-align: center;
            direction: rtl;
            /* transform: scale(0.9); *//* Adjust the scaling factor as needed */
        }
        .warp {
    margin: 0 auto;
    max-width: 1300px;
    width: auto;
    padding: 0;
}
        .header {
    font-weight: bold;
    color: white;
    border-bottom: 2px solid red;
    max-width: 354px;
    margin:0px auto;
    padding: 25px;
    font-size: 31px;
        }
        .All{
        margin-top: 121px !important;
}
.icons{
        margin-top: 21px !important;
        margin-left: 0px !important;
}
        .dashboard {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
        }
        .item {
    flex: 1 1 calc(33% - 40px);
    max-width: 274px;
    padding: 15px;
    background-color: #ffffff12;
    border-radius: 10px;
    margin-left: 10px;
    margin-bottom: 10px;
    box-shadow: 0 0px 5px 3px lch(100 0 0 / 0.13);
        }
        .item h3 {
            margin: 0;
            font-size: 18px;
        }
        .item .value {
    margin-top: 10px;
    font-size: 24px;
    font-weight: bold;
    color: red;
    direction: ltr;
        }
        .car-speed {
            margin-top: 30px;
            font-size: 40px;
            font-weight: bold;
            color: white;
        }
        
        /*************/
        .battery-icon {
    width: 70px;
    height: 140px;
    border-radius: 0px;
    position: relative;
    display: flex;
    align-items: flex-end;
}



.c_battery {
    display: flex
;
    margin-right: 20px;
    align-items: center;
    justify-content: center;
}
.All {
    margin-bottom: 125px;
    margin-top: 50px;
    display: flex;
    align-items: center;
    margin-left: 63px;
    flex-wrap: wrap;
    justify-content: center;
}
.r {
    display: block;
    width: 400px;
    scale: 2;
    margin-right: 27px;
    margin-left: 20px;
}
/**********/
.button {
    --black-700: hsla(0 0% 12% / 1);
    --border_radius: 9999px;
    --transtion: 0.3s ease-in-out;
    --offset: 2px;
    cursor: pointer;
    position: relative;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transform-origin: center;
    padding: 1rem 2rem;
    background-color: transparent;
    border: none;
    border-radius: var(--border_radius);
    transform: scale(calc(1 + (var(--active, 0) * 0.1)));
    transition: transform var(--transtion);
    flex-direction: column;
}

.button::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    background-color: var(--black-700);
    border-radius: var(--border_radius);
    box-shadow: inset 0 0.5px hsl(0, 0%, 100%), inset 0 -1px 2px 0 hsl(0, 0%, 0%), 0px 4px 10px -4px hsla(0 0% 0% / calc(1 - 0)), 0 0 0 calc(var(--active, 0)* 0.375rem) #ff0000;
    transition: all var(--transtion);
    z-index: 0;
}

.button::after {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    background-color: #ff0000;
    background-image: radial-gradient(at 51% 89%, #ff0000 0px, transparent 50%), radial-gradient(at 100% 100%, #ff0000 0px, transparent 50%), radial-gradient(at 22% 91%, #ff0000 0px, transparent 50%);
    background-position: top;
    opacity: var(--active, 0);
    border-radius: var(--border_radius);
    transition: opacity var(--transtion);
    z-index: 2;
}

.button:is(:hover, :focus-visible) {
  --active: 1;
}
.button:active {
  transform: scale(1);
}

.button .dots_border {
  --size_border: calc(100% + 2px);

  overflow: hidden;

  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);

  width: var(--size_border);
  height: var(--size_border);
  background-color: transparent;

  border-radius: var(--border_radius);
  z-index: -10;
}

.button .dots_border::before {
  content: "";
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  transform-origin: left;
  transform: rotate(0deg);

  width: 100%;
  height: 2rem;
  background-color: white;

  mask: linear-gradient(transparent 0%, white 120%);
  animation: rotate 2s linear infinite;
}

@keyframes rotate {
  to {
    transform: rotate(360deg);
  }
}

.button .sparkle {
  position: relative;
  z-index: 10;

  width: 1.75rem;
}

.button .sparkle .path {
  fill: currentColor;
  stroke: currentColor;

  transform-origin: center;

  color: hsl(0, 0%, 100%);
}

.button:is(:hover, :focus) .sparkle .path {
  animation: path 1.5s linear 0.5s infinite;
}

.button .sparkle .path:nth-child(1) {
  --scale_path_1: 1.2;
}
.button .sparkle .path:nth-child(2) {
  --scale_path_2: 1.2;
}
.button .sparkle .path:nth-child(3) {
  --scale_path_3: 1.2;
}

@keyframes path {
  0%,
  34%,
  71%,
  100% {
    transform: scale(1);
  }
  17% {
    transform: scale(var(--scale_path_1, 1));
  }
  49% {
    transform: scale(var(--scale_path_2, 1));
  }
  83% {
    transform: scale(var(--scale_path_3, 1));
  }
}

.button .text_button {
    position: relative;
    z-index: 10;
    background-image: linear-gradient(90deg, hsla(0 0% 100% / 1) 0%, hsl(0deg 0% 100% / 62%) 120%);
    background-clip: text;
    font-size: 1rem;
    color: transparent;
    font-size: 4.5em;
}



@import url("https://fonts.googleapis.com/css?family=Raleway:400");

* {
	box-sizing: border-box;
}

@property --angle {
  syntax: '<angle>';
  initial-value: 90deg;
  inherits: true;
}

@property --gradX {
  syntax: '<percentage>';
  initial-value: 50%;
  inherits: true;
}

@property --gradY {
  syntax: '<percentage>';
  initial-value: 0%;
  inherits: true;
}


:root {
	--d: 3000ms;
	--angle: 90deg;
	--gradX: 100%;
	--gradY: 50%;
	--c1: rgba(168, 239, 255, 1);
	--c2: rgba(168, 239, 255, 0.1);
}



.box {
    font-size: 3vw;
    margin: 0 auto;
background-color: #ffffff0f;
    scale: 0.9;
    border: 0.35rem solid;
    padding: 0vw;
    border-image: conic-gradient(from var(--angle), var(--c2), var(--c1) 0.1turn, var(--c1) 0.15turn, var(--c2) 0.25turn) 30;
    animation: borderRotate var(--d) linear infinite forwards;
}

.box:nth-child(2) {
	border-image: radial-gradient(ellipse at var(--gradX) var(--gradY), var(--c1), var(--c1) 10%, var(--c2) 40%) 30;
	animation: borderRadial var(--d) linear infinite forwards;
}

@keyframes borderRotate {
	100% {
		--angle: 420deg;
	}
}

@keyframes borderRadial {
	20% {
		--gradX: 100%;
		--gradY: 50%;
	}
	40% {
		--gradX: 100%;
		--gradY: 100%;
	}
	60% {
		--gradX: 50%;
		--gradY: 100%;
	}
	80% {
		--gradX: 0%;
		--gradY: 50%;
	}
	100% {
		--gradX: 50%;
		--gradY: 0%;
	}
}
/**/
.progress {
    width: 200px;
    height: 200px;
    position: relative;
    transform: translate(-50%, 0%) rotateY(180deg);
}
.progress:before {
  content: "";
  position: absolute;
  width: 185px;
  height: 185px;
  background: #232323;
  border-radius: 100%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 99;
}
.progress:after {
  content: "";
  position: absolute;
  width: 8px;
  height: 100px;
  background: linear-gradient(180deg, #d63031, #232323);
  border-radius: 10px;
  box-shadow: 0 -19px 9px -3px #d63031;
  top: 0;
  right: 50%;
  margin-right: -4px;
  z-index: 999;
  transform: rotate(90deg);
  transform-origin: bottom;
  animation-name: meter;
  animation-duration: 5s;
  animation-iteration-count: infinite;
  animation-timing-function: cubic-bezier(0, 0.1, 0.9, 0.81);
  animation-play-state: paused;
  animation-direction: reverse;
  animation-delay: 5s;
}
.progress .precent {
  position: absolute;
  top: 29px;
  left: 50%;
  z-index: 99;
  transform: translate(-50%, 0) rotateY(180deg);
  font-size: 19px;
  color: white;
  width: 47px;
  text-align: center;
  line-height: 1.5;
}
.progress .precent:after {
  content: "";
  position: absolute;
  width: 35px;
  height: 35px;
  background: #323232;
  border-radius: 100%;
  top: 85px;
  right: -35px;
}
.progress .precent:before {
  content: "";
  position: absolute;
  width: 35px;
  height: 35px;
  background: #323232;
  border-radius: 100%;
  top: 85px;
  left: -35px;
}
.progress .circle {
  width: 200px;
  height: 200px;
  background: white;
  background: conic-gradient(
    from 91deg,
    #d63031 0%,
    #ffffff 20%,
    transparent 100%
  );
  -webkit-clip-path: polygon(
    0% 100%,
    0% 0%,
    100% 0%,
    100% 50%,
    50% 50%,
    100% 50%,
    100% 100%
  );
  clip-path: polygon(
    0% 100%,
    0% 0%,
    100% 0%,
    100% 50%,
    50% 50%,
    100% 50%,
    100% 100%
  );
  animation-name: loading;
  animation-duration: 5s;
  animation-iteration-count: infinite;
  animation-timing-function: cubic-bezier(0, 0.1, 0.9, 0.81);
  animation-play-state: paused;
  animation-direction: reverse;
  animation-delay: 5s;
  border-radius: 100%;
}
@keyframes loading {
  0% {
    -webkit-clip-path: polygon(
      0% 100%,
      0% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      100% 50%,
      100% 100%
    );
    clip-path: polygon(
      0% 100%,
      0% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      100% 50%,
      100% 100%
    );
  }
  12.5% {
    -webkit-clip-path: polygon(
      0% 100%,
      0% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      100% 100%,
      100% 100%
    );
    clip-path: polygon(
      0% 100%,
      0% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      100% 100%,
      100% 100%
    );
  }
  25% {
    -webkit-clip-path: polygon(
      0% 100%,
      0% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      50% 100%,
      50% 100%
    );
    clip-path: polygon(
      0% 100%,
      0% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      50% 100%,
      50% 100%
    );
  }
  37.5% {
    -webkit-clip-path: polygon(
      0% 100%,
      0% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      0% 100%,
      0% 100%
    );
    clip-path: polygon(
      0% 100%,
      0% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      0% 100%,
      0% 100%
    );
  }
  50% {
    -webkit-clip-path: polygon(
      0% 50%,
      0% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      0% 50%,
      0% 50%
    );
    clip-path: polygon(
      0% 50%,
      0% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      0% 50%,
      0% 50%
    );
  }
  62.5% {
    -webkit-clip-path: polygon(
      0% 0%,
      0% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      0% 0%,
      0% 0%
    );
    clip-path: polygon(0% 0%, 0% 0%, 100% 0%, 100% 50%, 50% 50%, 0% 0%, 0% 0%);
  }
  75% {
    -webkit-clip-path: polygon(
      50% 0%,
      50% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      50% 0%,
      50% 0%
    );
    clip-path: polygon(
      50% 0%,
      50% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      50% 0%,
      50% 0%
    );
  }
  87.5% {
    -webkit-clip-path: polygon(
      100% 0%,
      100% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      100% 0%,
      100% 0%
    );
    clip-path: polygon(
      100% 0%,
      100% 0%,
      100% 0%,
      100% 50%,
      50% 50%,
      100% 0%,
      100% 0%
    );
  }
  100% {
    -webkit-clip-path: polygon(
      100% 50%,
      100% 50%,
      100% 50%,
      100% 50%,
      50% 50%,
      100% 50%,
      100% 50%
    );
    clip-path: polygon(
      100% 50%,
      100% 50%,
      100% 50%,
      100% 50%,
      50% 50%,
      100% 50%,
      100% 50%
    );
  }
}
@keyframes meter {
  0% {
    transform: rotate(90deg);
  }
  25% {
    transform: rotate(179deg);
  }
  50% {
    transform: rotate(269deg);
  }
  75% {
    transform: rotate(360deg);
  }
  100% {
    transform: rotate(450deg);
  }
}
body > div:nth-child(4) {
        display: none;

}
.progress .range {
    margin-top:50px;
    display: none;
}
.progress input[type="range"] {
  -webkit-appearance: none;
  width: 100%;
  background: transparent;
}

.progress input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none;
}

.progress input[type="range"]:focus {
  outline: none;
}

.progress input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none;
  height: 16px;
  width: 16px;
  border-radius: 100%;
  background: white;
  cursor: pointer;
  margin-top: -6px;
  z-index: 9;
  position: relative;
}

.progress input[type="range"]::-moz-range-thumb {
  height: 16px;
  width: 16px;
  border-radius: 100%;
  background: white;
  cursor: pointer;
  border: 0;
  z-index: 9;
  position: relative;
}

.progress input[type="range"]::-webkit-slider-runnable-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  background: white;
  border-radius: 20px;
}

.progress input[type="range"]::-moz-range-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  background: white;
  border-radius: 20px;
}

@media screen and (max-width: 770px) {
    .All{
            display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
        margin-bottom: 25px;
    }
    .r {
            margin: 25px 0px;
         
    }
}

.homepage__bg, body .body {
    z-index: -1;
    background-size: cover;
    height: 100%;
    left: 0;
    top: 0;
}

.homepage__bg::after {
    content: '';
    background: linear-gradient(180deg, #1d1d1d14, #02020f 88%);
    position: absolute;
    bottom: 0;
    right: 0;
    left: 0;
    height: 60%;
}
.homepage__bg, .popSearch, header.Main--Header {
    position: fixed;
    right: 0;
}

.homepage__bg {
    background-position: center;
    opacity: .05;
    transition: .3s;
}
.icons {
     display: flex;      /* This makes the child elements (icons) align in a row */
  gap: 11px;           /* Set a smaller gap between the icons */
  justify-content: center; /* Optionally, center the icons */
   margin: 0 auto;
}
.icon {
    width: 50px; /* Set the width of each icon */
    height: 50px; /* Set the height of each icon */
    display: inline-block;
}



.button p {
    color: #fff;
    z-index: 999;
    margin: 0;
}
    </style>
    
</head>
<body>
    <div class="homepage__bg" style="background-image: url('/home.jpg');"></div>

    <div class="header">Vehicle Dashboard</div>

    <script>
        $(function () {
            var range = $("#range")[0];

            function updateCircle() {
                var percent = ((range.value - range.min) / (range.max - range.min)) * 5;
                var percentshow = Math.round(((range.value - range.min) / (range.max - range.min)) * 100);

                // Remove the previous style and update based on the percentage
                $("#meterstyle").remove();

                if (percent < 5) {
                    $(".progress .circle").attr("style", "animation-delay:-" + percent + "s");
                    $("body").append("<div id='meterstyle'><style>.progress:after{animation-delay:-" + percent + "s;}</style></div>");
                } else {
                    $(".progress .circle").attr("style", "animation-delay:5s");
                    $("body").append("<div id='meterstyle'><style>.progress:after{animation-delay:5s;}</style></div>");
                }

                $(".progress .precent").text(percentshow + " km/h");
            }

            // Update the circle periodically
            setInterval(updateCircle, 1);

            // Update the circle on input change
            $(document).on("input", "#range", function () {
                updateCircle();
            });
        });

// Function to update the icons visibility based on JSON data
function updateIcons(data) {
    
}






       function fetchDataFromJSON() {
    fetch('https://projectegypt.online/new/data.json') // Fetch data from the external URL
        .then(response => response.json())
        .then(data => {
            if (data.length === 0) {
                console.error('No data found');
                return;
            }
            const latestData = data[0]; // Assuming the JSON contains an array and we want the first object

            console.log('Fetched data:', latestData); // Log the data to the console

            // Update dashboard values
            document.getElementById('energyConsumed').textContent =`${ latestData.energy_consumed || 'N/A'} J`;
            document.getElementById('powerConsumed').textContent =`${ latestData.power_consumed || 'N/A'} W`;
            document.getElementById('totalCurrent').textContent = `${latestData.total_current || 'N/A'} A`;
            document.getElementById('totalVoltage').textContent = `${latestData.total_voltage || 'N/A'} v`;
            document.getElementById('YawRatefast').textContent = `${latestData.yaw_rate || 'N/A'} rad/s`;
            document.getElementById('ambientTemp').textContent = `${latestData.ambient_temperature || 'N/A'} °C`;
            document.getElementById('righttemp').textContent = `${latestData.right_inverter_max_temp || 'N/A'} °C`;
            document.getElementById('leftInverterTemp').textContent = `${latestData.left_inverter_max_temp || 'N/A'} °C`;
         

            // Display number_of_labs
          //   document.querySelector('.text_button').textContent = latestData.number_of_labs || 'N/A';

            // Update SOC and battery-level
            const socValue = latestData.soc || 0;
            const batteryLevel = document.querySelector('.battery-level');
            batteryLevel.style.height = `${socValue}%`;
            batteryLevel.style.backgroundColor = getBatteryColor(socValue);
            batteryLevel.querySelector('span').textContent = `${socValue}%`;

            // Additionally, display raw JSON in #data-display div
           //  document.getElementById('data-display').textContent = JSON.stringify(latestData, null, 2);
            
            // Update car speed
            const carSpeed = latestData.car_speed_gauge || 0;
            document.getElementById('range').value = carSpeed;
            document.querySelector('.precent').textContent = `${carSpeed} km/h`;
        

    // Check turn right status and apply style changes
    if (latestData.turnright === "0") {
      document.getElementById('turnright_off').style.display = 'block'; // Show the "off" icon
      document.getElementById('turnright_on').style.display = 'none';  // Hide the "on" icon
    } else {
      document.getElementById('turnright_on').style.display = 'block'; // Show the "on" icon
      document.getElementById('turnright_off').style.display = 'none'; // Hide the "off" icon
    }
    
     // Check turn right status and apply style changes
    if (latestData.turnleft === "0") {
      document.getElementById('turnleft_off').style.display = 'block'; // Show the "off" icon
      document.getElementById('turnleft_on').style.display = 'none';  // Hide the "on" icon
    } else {
      document.getElementById('turnleft_on').style.display = 'block'; // Show the "on" icon
      document.getElementById('turnleft_off').style.display = 'none'; // Hide the "off" icon
    }
    
     // Check turn right status and apply style changes
    if (latestData.lights_v1 === "0") {
      document.getElementById('lights_v1_off').style.display = 'block'; // Show the "off" icon
      document.getElementById('lights_v1_on').style.display = 'none';  // Hide the "on" icon
    } else {
      document.getElementById('lights_v1_on').style.display = 'block'; // Show the "on" icon
      document.getElementById('lights_v1_off').style.display = 'none'; // Hide the "off" icon
    }

            
    
    
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

       function fetchdriverFromJSON() {
    fetch('https://projectegypt.online/new/driver.json') // Fetch driver from the external URL
        .then(response => response.json())
        .then(driver => {
            if (driver.length === 0) {
                console.error('No driver found');
                return;
            }
            const latestdriver = driver[0]; // Assuming the JSON contains an array and we want the first object

            console.log('Fetched driver:', latestdriver); // Log the driver to the console

            
            // Display number_of_labs
            document.querySelector('.text_button').textContent = latestdriver.number_of_labs || '0';
  

        })
        .catch(error => {
            console.error('Error fetching driver:', error);
        });
}



        // Fetch data every 500ms
     setInterval(fetchDataFromJSON, 500);
 setInterval(fetchdriverFromJSON, 500);
  
  setInterval(updateIcons, 500);
  
        // Helper function to get battery color based on SOC
        function getBatteryColor(soc) {
            if (soc >= 0 && soc < 20) return 'red';
            if (soc >= 20 && soc < 50) return 'orange';
            if (soc >= 50 && soc < 80) return '#3d5a80';
            if (soc >= 80 && soc <= 100) return 'green';
            return 'gray';
        }
        
    </script>


    
      </div>
      
 <div id="data-display"></div>

   


<!-- <div class="icons">-->
<!--    <div id="turnright_off" class="icon" style="display: block;">-->

      <!-- Turn Right SVG Off -->
<!--  <svg fill="#ffffff" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 211.398 211.398" xml:space="preserve" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M182.325,56.618c-16.482-12.067-37.006-19.272-54.901-19.272c-18.011,0-31.322,7.262-39.563,21.583 c-6.457,11.221-9.597,26.52-9.597,46.771c0,20.25,3.139,35.549,9.597,46.771c8.242,14.321,21.553,21.583,39.563,21.583 c17.895,0,38.419-7.205,54.901-19.272c18.748-13.727,29.073-31.158,29.073-49.081C211.398,87.775,201.073,70.345,182.325,56.618z M173.464,142.677c-13.795,10.101-31.437,16.375-46.04,16.375c-15.904,0-34.16-6.064-34.16-53.353s18.256-53.354,34.16-53.354 c14.604,0,32.245,6.274,46.04,16.375c14.575,10.671,22.935,24.149,22.935,36.979C196.398,118.528,188.039,132.006,173.464,142.677z "></path> <path d="M64.055,44.945L7.5,44.944c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5l56.555,0.001c4.142,0,7.5-3.358,7.5-7.5 S68.197,44.945,64.055,44.945z"></path> <path d="M64.055,72.299H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,75.657,68.197,72.299,64.055,72.299z"></path> <path d="M64.055,99.653H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,103.011,68.197,99.653,64.055,99.653z"></path> <path d="M64.055,127.008H7.5c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 S68.197,127.008,64.055,127.008z"></path> <path d="M64.055,154.362H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,157.72,68.197,154.362,64.055,154.362z"></path> </g> </g></svg>-->
<!--    </div>-->
    
<!--      <div id="turnright_on" class="icon"style="display: none;">-->

      <!-- Turn Right SVG on -->
<!--      <svg fill="#ffae00" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 211.398 211.398" xml:space="preserve" transform="rotate(180)" stroke="#ffae00"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M182.325,56.618c-16.482-12.067-37.006-19.272-54.901-19.272c-18.011,0-31.322,7.262-39.563,21.583 c-6.457,11.221-9.597,26.52-9.597,46.771c0,20.25,3.139,35.549,9.597,46.771c8.242,14.321,21.553,21.583,39.563,21.583 c17.895,0,38.419-7.205,54.901-19.272c18.748-13.727,29.073-31.158,29.073-49.081C211.398,87.775,201.073,70.345,182.325,56.618z M173.464,142.677c-13.795,10.101-31.437,16.375-46.04,16.375c-15.904,0-34.16-6.064-34.16-53.353s18.256-53.354,34.16-53.354 c14.604,0,32.245,6.274,46.04,16.375c14.575,10.671,22.935,24.149,22.935,36.979C196.398,118.528,188.039,132.006,173.464,142.677z "></path> <path d="M64.055,44.945L7.5,44.944c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5l56.555,0.001c4.142,0,7.5-3.358,7.5-7.5 S68.197,44.945,64.055,44.945z"></path> <path d="M64.055,72.299H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,75.657,68.197,72.299,64.055,72.299z"></path> <path d="M64.055,99.653H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,103.011,68.197,99.653,64.055,99.653z"></path> <path d="M64.055,127.008H7.5c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 S68.197,127.008,64.055,127.008z"></path> <path d="M64.055,154.362H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,157.72,68.197,154.362,64.055,154.362z"></path> </g> </g></svg>-->

      
      
<!--    </div>-->
    
    
  
    
   
<!--    <div id="lights_v1_off" class="icon"  style="display: block;">-->
    <!-- Lights Off SVG -->
<!--    <svg fill="#ffffff" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 181.328 181.328" xml:space="preserve">-->
<!--        <g>-->
<!--            <path d="M118.473,46.308V14.833c0-4.142-3.358-7.5-7.5-7.5H70.357c-4.142,0-7.5,3.358-7.5,7.5v31.474 C51.621,54.767,44.34,68.214,44.34,83.331c0,25.543,20.781,46.324,46.324,46.324s46.324-20.781,46.324-46.324 C136.988,68.215,129.708,54.769,118.473,46.308z M77.857,22.333h25.615v16.489c-4.071-1.174-8.365-1.815-12.809-1.815 c-4.443,0-8.736,0.642-12.807,1.814V22.333z M90.664,114.655c-17.273,0-31.324-14.052-31.324-31.324 c0-17.272,14.052-31.324,31.324-31.324s31.324,14.052,31.324,31.324C121.988,100.604,107.937,114.655,90.664,114.655z"></path>-->
<!--            <path d="M40.595,83.331c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h25.595 C37.237,90.831,40.595,87.473,40.595,83.331z"></path>-->
<!--            <path d="M173.828,75.831h-25.595c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h25.595c4.142,0,7.5-3.358,7.5-7.5 C181.328,79.189,177.97,75.831,173.828,75.831z"></path>-->
<!--            <path d="M44.654,47.926c1.464,1.465,3.384,2.197,5.303,2.197c1.919,0,3.839-0.732,5.303-2.197c2.929-2.929,2.929-7.678,0-10.606 L37.162,19.222c-2.929-2.93-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L44.654,47.926z"></path>-->
<!--            <path d="M136.674,118.735c-2.93-2.929-7.678-2.928-10.607,0c-2.929,2.929-2.928,7.678,0,10.607l18.1,18.098 c1.465,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.304-2.197c2.929-2.929,2.928-7.678,0-10.607L136.674,118.735z"></path>-->
<!--            <path d="M44.654,118.736l-18.099,18.098c-2.929,2.929-2.929,7.677,0,10.607c1.464,1.465,3.384,2.197,5.303,2.197 c1.919,0,3.839-0.732,5.303-2.197l18.099-18.098c2.929-2.929,2.929-7.677,0-10.606C52.332,115.807,47.583,115.807,44.654,118.736z"></path>-->
<!--            <path d="M131.371,50.123c1.919,0,3.839-0.732,5.303-2.196l18.1-18.098c2.929-2.929,2.929-7.678,0-10.607 c-2.929-2.928-7.678-2.929-10.607-0.001l-18.1,18.098c-2.929,2.929-2.929,7.678,0,10.607 C127.532,49.391,129.452,50.123,131.371,50.123z"></path>-->
<!--            <path d="M90.664,133.4c-4.142,0-7.5,3.358-7.5,7.5v25.595c0,4.142,3.358,7.5,7.5,7.5c4.142,0,7.5-3.358,7.5-7.5V140.9 C98.164,136.758,94.806,133.4,90.664,133.4z"></path>-->
<!--        </g>-->
<!--    </svg>-->
<!--    </div>-->

<!--    <div id="lights_v1_on" class="icon"  style="display: none;">-->

    <!-- Lights On SVG -->
<!--    <svg fill="#ff0000" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 181.328 181.328" xml:space="preserve" stroke="#ff0000">-->
<!--        <g>-->
<!--            <path d="M118.473,46.308V14.833c0-4.142-3.358-7.5-7.5-7.5H70.357c-4.142,0-7.5,3.358-7.5,7.5v31.474 C51.621,54.767,44.34,68.214,44.34,83.331c0,25.543,20.781,46.324,46.324,46.324s46.324-20.781,46.324-46.324 C136.988,68.215,129.708,54.769,118.473,46.308z M77.857,22.333h25.615v16.489c-4.071-1.174-8.365-1.815-12.809-1.815 c-4.443,0-8.736,0.642-12.807,1.814V22.333z M90.664,114.655c-17.273,0-31.324-14.052-31.324-31.324 c0-17.272,14.052-31.324,31.324-31.324s31.324,14.052,31.324,31.324C121.988,100.604,107.937,114.655,90.664,114.655z"></path>-->
<!--            <path d="M40.595,83.331c0-4.142-3.358-7.5-7.5-7.5H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h25.595 C37.237,90.831,40.595,87.473,40.595,83.331z"></path>-->
<!--            <path d="M173.828,75.831h-25.595c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h25.595c4.142,0,7.5-3.358,7.5-7.5 C181.328,79.189,177.97,75.831,173.828,75.831z"></path>-->
<!--            <path d="M44.654,47.926c1.464,1.465,3.384,2.197,5.303,2.197c1.919,0,3.839-0.732,5.303-2.197c2.929-2.929,2.929-7.678,0-10.606 L37.162,19.222c-2.929-2.93-7.678-2.929-10.606,0c-2.929,2.929-2.929,7.678,0,10.606L44.654,47.926z"></path>-->
<!--            <path d="M136.674,118.735c-2.93-2.929-7.678-2.928-10.607,0c-2.929,2.929-2.928,7.678,0,10.607l18.1,18.098 c1.465,1.464,3.384,2.196,5.303,2.196c1.919,0,3.839-0.732,5.304-2.197c2.929-2.929,2.928-7.678,0-10.607L136.674,118.735z"></path>-->
<!--            <path d="M44.654,118.736l-18.099,18.098c-2.929,2.929-2.929,7.677,0,10.607c1.464,1.465,3.384,2.197,5.303,2.197 c1.919,0,3.839-0.732,5.303-2.197l18.099-18.098c2.929-2.929,2.929-7.677,0-10.606C52.332,115.807,47.583,115.807,44.654,118.736z"></path>-->
<!--            <path d="M131.371,50.123c1.919,0,3.839-0.732,5.303-2.196l18.1-18.098c2.929-2.929,2.929-7.678,0-10.607 c-2.929-2.928-7.678-2.929-10.607-0.001l-18.1,18.098c-2.929,2.929-2.929,7.678,0,10.607 C127.532,49.391,129.452,50.123,131.371,50.123z"></path>-->
<!--            <path d="M90.664,133.4c-4.142,0-7.5,3.358-7.5,7.5v25.595c0,4.142,3.358,7.5,7.5,7.5c4.142,0,7.5-3.358,7.5-7.5V140.9 C98.164,136.758,94.806,133.4,90.664,133.4z"></path>-->
<!--        </g>-->
<!--    </svg>-->
<!--</div>-->
<!--  <div id="turnleft_off" class="icon"  style="display: block;">-->
      <!-- Turn Left SVG Off -->
<!--<svg fill="#ffffff" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 211.398 211.398" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M182.325,56.618c-16.482-12.067-37.006-19.272-54.901-19.272c-18.011,0-31.322,7.262-39.563,21.583 c-6.457,11.221-9.597,26.52-9.597,46.771c0,20.25,3.139,35.549,9.597,46.771c8.242,14.321,21.553,21.583,39.563,21.583 c17.895,0,38.419-7.205,54.901-19.272c18.748-13.727,29.073-31.158,29.073-49.081C211.398,87.775,201.073,70.345,182.325,56.618z M173.464,142.677c-13.795,10.101-31.437,16.375-46.04,16.375c-15.904,0-34.16-6.064-34.16-53.353s18.256-53.354,34.16-53.354 c14.604,0,32.245,6.274,46.04,16.375c14.575,10.671,22.935,24.149,22.935,36.979C196.398,118.528,188.039,132.006,173.464,142.677z "></path> <path d="M64.055,44.945L7.5,44.944c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5l56.555,0.001c4.142,0,7.5-3.358,7.5-7.5 S68.197,44.945,64.055,44.945z"></path> <path d="M64.055,72.299H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,75.657,68.197,72.299,64.055,72.299z"></path> <path d="M64.055,99.653H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,103.011,68.197,99.653,64.055,99.653z"></path> <path d="M64.055,127.008H7.5c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 S68.197,127.008,64.055,127.008z"></path> <path d="M64.055,154.362H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,157.72,68.197,154.362,64.055,154.362z"></path> </g> </g></svg>-->
<!--    </div>-->
    
<!--      <div id="turnleft_on" class="icon" style="display: none;">-->
      <!-- Turn Left SVG on -->
<!--     <svg fill="#ffae00" height="50px" width="50px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 211.398 211.398" xml:space="preserve" stroke="#ffae00"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M182.325,56.618c-16.482-12.067-37.006-19.272-54.901-19.272c-18.011,0-31.322,7.262-39.563,21.583 c-6.457,11.221-9.597,26.52-9.597,46.771c0,20.25,3.139,35.549,9.597,46.771c8.242,14.321,21.553,21.583,39.563,21.583 c17.895,0,38.419-7.205,54.901-19.272c18.748-13.727,29.073-31.158,29.073-49.081C211.398,87.775,201.073,70.345,182.325,56.618z M173.464,142.677c-13.795,10.101-31.437,16.375-46.04,16.375c-15.904,0-34.16-6.064-34.16-53.353s18.256-53.354,34.16-53.354 c14.604,0,32.245,6.274,46.04,16.375c14.575,10.671,22.935,24.149,22.935,36.979C196.398,118.528,188.039,132.006,173.464,142.677z "></path> <path d="M64.055,44.945L7.5,44.944c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5l56.555,0.001c4.142,0,7.5-3.358,7.5-7.5 S68.197,44.945,64.055,44.945z"></path> <path d="M64.055,72.299H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,75.657,68.197,72.299,64.055,72.299z"></path> <path d="M64.055,99.653H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,103.011,68.197,99.653,64.055,99.653z"></path> <path d="M64.055,127.008H7.5c-4.142,0-7.5,3.358-7.5,7.5s3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 S68.197,127.008,64.055,127.008z"></path> <path d="M64.055,154.362H7.5c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h56.555c4.142,0,7.5-3.358,7.5-7.5 C71.555,157.72,68.197,154.362,64.055,154.362z"></path> </g> </g></svg>-->
<!--    </div>-->
    
    
      </div>
    <div class="All"> 
        <!-- Button showing number_of_labs -->
        <button class="button">
            <div class="dots_border"></div>
            <span class="text_button">N/A</span> <!-- Placeholder for number_of_labs -->
            <p>Number of labs</p>
        </button>

        <div class="r"> 
            <div class="progress">
                <div class="precent">0 km/h</div> <!-- Initial placeholder -->
                <div class="circle"></div>
                <div class="range">
                    <input type="range" min="0" max="100" value="0" id="range">
                </div>
            </div>
        </div>
    
        <!-- Battery SOC -->
        <div class="c_battery" style="border: 2px solid gray;"> 
            <div class="battery-icon" style="border: 2px solid gray;"> 
                <div class="battery-level" style="background-color: gray; height: 0%;">
                    <span>N/A%</span> <!-- Placeholder for SOC -->
                </div>
            </div>
        </div>
        
      

        <style>
            .battery-icon::after {
                content: '';
                width: 21px;
                height: 5px;
                position: absolute;
                top: -5px;
                left: calc(50% - 11px);
            }

            .battery-level {
                width: 100%;
                height: 0%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #fff;
                font-size: 14px;
                transition: height 0.3s ease, background-color 0.3s ease;
            }
        </style>
    </div>
       <div class="warp">
        <div class="box">
            <div class="dashboard">
                <div class="item"><h3>Energy Consumed</h3><div class="value" id="energyConsumed"></div></div>
                <div class="item"><h3>Power Consumed</h3><div class="value" id="powerConsumed"></div></div>
                <div class="item"><h3>Total Current</h3><div class="value" id="totalCurrent"></div></div>
                <div class="item"><h3>Total Voltage</h3><div class="value" id="totalVoltage"></div></div>
                <div class="item"><h3>Yaw Rate</h3><div class="value" id="YawRatefast"></div></div>
                <div class="item"><h3>Ambient Temperature</h3><div class="value" id="ambientTemp"></div></div>
                <div class="item"><h3>Right Inverter Temperature</h3><div class="value" id="righttemp"></div></div>
                <div class="item"><h3>Left Inverter Temperature</h3><div class="value" id="leftInverterTemp"></div></div>
            </div>
        </div>
    </div>
</body>
</html>
