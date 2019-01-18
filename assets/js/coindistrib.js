function request(Data) {
	var xhr   = getXMLHttpRequest();
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			readData(xhr.responseXML);
			document.getElementById("loader").style.display = "none";
		} else if (xhr.readyState < 4) {
			document.getElementById("loader").style.display = "inline";
		}
	};
	
	xhr.open("POST", "includes/test.php", true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("gp=" + value);
}

//request(readData);

/*--------------  coin distrubution chart END ------------*/
if ($('#coin_distribution').length) {
    zingchart.THEME = "classic";
    var myConfig = {
        "globals": {
            "font-family": "Roboto"
        },
        "graphset": [{
            "type": "pie",
            "background-color": "#fff",
            "legend": {
                "background-color": "none",
                "border-width": 0,
                "shadow": false,
                "layout": "float",
                "margin": "auto auto 16% auto",
                "marker": {
                    "border-radius": 3,
                    "border-width": 0
                },
                "item": {
                    "color": "%backgroundcolor"
                }
            },
            "plotarea": {
                "background-color": "#FFFFFF",
                "border-color": "#DFE1E3",
                "margin": "25% 8%"
            },
            "labels": [{
                "x": "45%",
                "y": "47%",
                "width": "10%",
                "text": "350 Coin",
                "font-size": 17,
                "font-weight": 700
            }],
            "plot": {
                "size": 70,
                "slice": 90,
                "margin-right": 0,
                "border-width": 0,
                "shadow": 0,
                "value-box": {
                    "visible": true
                },
                "tooltip": {
                    "text": "%v USD",
                    "shadow": false,
                    "border-radius": 2
                }
            },
            "series": [{
                "values": [1355460],
                "text": "Bitcoin",
                "background-color": "#4cff63"
            },
            {
                "values": [1585218],
                "text": "LiteCoin",
                "background-color": "#fd9c21"
            },
            {
                "values": [1064598],
                "text": "Euthorium",
                "background-color": "#2c13f8"
            }
            ]
        }
        ]
    };
    zingchart.render({
        id: 'coin_distribution',
        data: myConfig,
    });
}
