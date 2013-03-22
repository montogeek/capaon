(function (root, factory) {
	if (typeof define === 'function' && define.amd) {
		define(factory);
	} else {
		root.sampleData = factory();
	}
}(this, function () {
	return {
		"geonames": [{
			"id": "capital of a political entity",
			"nombre": "Mexico City",
			"resumen": "MX",
			"contenido": "P",
			"fclName": "city, village,...",
			"name": "Mexico City",
			"wikipedia": "",
			"lng": -99.12766456604,
			"fcode": "PPLC",
			"geonameId": 3530597,
			"lat": 19.428472427036,
			"population": 12294193
		}, {
			"id": "capital of a political entity",
			"nombre": "Manila",
			"resumen": "PH",
			"contenido": "P",
			"fclName": "city, village,...",
			"name": "Manila",
			"wikipedia": "",
			"lng": 120.9822,
			"fcode": "PPLC",
			"geonameId": 1701668,
			"lat": 14.6042,
			"population": 10444527
		}, {
			"id": "capital of a political entity",
			"nombre": "Dhaka",
			"resumen": "BD",
			"contenido": "P",
			"fclName": "city, village,...",
			"name": "Dhaka",
			"wikipedia": "",
			"lng": 90.40743827819824,
			"fcode": "PPLC",
			"geonameId": 1185241,
			"lat": 23.710395616597037,
			"population": 10356500
		}]
	};
}));