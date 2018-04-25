/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 230);
/******/ })
/************************************************************************/
/******/ ({

/***/ 230:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(231);


/***/ }),

/***/ 231:
/***/ (function(module, exports) {



$('.filldatabase').click(function () {
    var text = '[\n' + '    {\n' + '        "title": "The Shawshank Redemption",\n' + '        "rank": "1",\n' + '        "id": "tt0111161"\n' + '    },\n' + '    {\n' + '        "title": "The Godfather",\n' + '        "rank": "2",\n' + '        "id": "tt0068646"\n' + '    },\n' + '    {\n' + '        "title": "The Godfather: Part II",\n' + '        "rank": "3",\n' + '        "id": "tt0071562"\n' + '    },\n' + '    {\n' + '        "title": "Pulp Fiction",\n' + '        "rank": "4",\n' + '        "id": "tt0110912"\n' + '    },\n' + '    {\n' + '        "title": "The Good, the Bad and the Ugly",\n' + '        "rank": "5",\n' + '        "id": "tt0060196"\n' + '    },\n' + '    {\n' + '        "title": "The Dark Knight",\n' + '        "rank": "6",\n' + '        "id": "tt0468569"\n' + '    },\n' + '    {\n' + '        "title": "12 Angry Men",\n' + '        "rank": "7",\n' + '        "id": "tt0050083"\n' + '    },\n' + '    {\n' + '        "title": "Schindler\'s List",\n' + '        "rank": "8",\n' + '        "id": "tt0108052"\n' + '    },\n' + '    {\n' + '        "title": "The Lord of the Rings: The Return of the King",\n' + '        "rank": "9",\n' + '        "id": "tt0167260"\n' + '    },\n' + '    {\n' + '        "title": "Fight Club",\n' + '        "rank": "10",\n' + '        "id": "tt0137523"\n' + '    },\n' + '    {\n' + '        "title": "Star Wars: Episode V - The Empire Strikes Back",\n' + '        "rank": "11",\n' + '        "id": "tt0080684"\n' + '    },\n' + '    {\n' + '        "title": "The Lord of the Rings: The Fellowship of the Ring",\n' + '        "rank": "12",\n' + '        "id": "tt0120737"\n' + '    },\n' + '    {\n' + '        "title": "One Flew Over the Cuckoo\'s Nest",\n' + '        "rank": "13",\n' + '        "id": "tt0073486"\n' + '    },\n' + '    {\n' + '        "title": "Inception",\n' + '        "rank": "14",\n' + '        "id": "tt1375666"\n' + '    },\n' + '    {\n' + '        "title": "Goodfellas",\n' + '        "rank": "15",\n' + '        "id": "tt0099685"\n' + '    },\n' + '    {\n' + '        "title": "Star Wars",\n' + '        "rank": "16",\n' + '        "id": "tt0076759"\n' + '    },\n' + '    {\n' + '        "title": "Seven Samurai",\n' + '        "rank": "17",\n' + '        "id": "tt0047478"\n' + '    },\n' + '    {\n' + '        "title": "Forrest Gump",\n' + '        "rank": "18",\n' + '        "id": "tt0109830"\n' + '    },\n' + '    {\n' + '        "title": "The Matrix",\n' + '        "rank": "19",\n' + '        "id": "tt0133093"\n' + '    },\n' + '    {\n' + '        "title": "The Lord of the Rings: The Two Towers",\n' + '        "rank": "20",\n' + '        "id": "tt0167261"\n' + '    },\n' + '    {\n' + '        "title": "City of God",\n' + '        "rank": "21",\n' + '        "id": "tt0317248"\n' + '    },\n' + '    {\n' + '        "title": "Se7en",\n' + '        "rank": "22",\n' + '        "id": "tt0114369"\n' + '    },\n' + '    {\n' + '        "title": "The Silence of the Lambs",\n' + '        "rank": "23",\n' + '        "id": "tt0102926"\n' + '    },\n' + '    {\n' + '        "title": "Once Upon a Time in the West",\n' + '        "rank": "24",\n' + '        "id": "tt0064116"\n' + '    },\n' + '    {\n' + '        "title": "Casablanca",\n' + '        "rank": "25",\n' + '        "id": "tt0034583"\n' + '    },\n' + '    {\n' + '        "title": "The Usual Suspects",\n' + '        "rank": "26",\n' + '        "id": "tt0114814"\n' + '    },\n' + '    {\n' + '        "title": "Raiders of the Lost Ark",\n' + '        "rank": "27",\n' + '        "id": "tt0082971"\n' + '    },\n' + '    {\n' + '        "title": "Rear Window",\n' + '        "rank": "28",\n' + '        "id": "tt0047396"\n' + '    },\n' + '    {\n' + '        "title": "It\'s a Wonderful Life",\n' + '        "rank": "29",\n' + '        "id": "tt0038650"\n' + '    },\n' + '    {\n' + '        "title": "Psycho",\n' + '        "rank": "30",\n' + '        "id": "tt0054215"\n' + '    },\n' + '    {\n' + '        "title": "Léon: The Professional",\n' + '        "rank": "31",\n' + '        "id": "tt0110413"\n' + '    },\n' + '    {\n' + '        "title": "Sunset Blvd.",\n' + '        "rank": "32",\n' + '        "id": "tt0043014"\n' + '    },\n' + '    {\n' + '        "title": "American History X",\n' + '        "rank": "33",\n' + '        "id": "tt0120586"\n' + '    },\n' + '    {\n' + '        "title": "Apocalypse Now",\n' + '        "rank": "34",\n' + '        "id": "tt0078788"\n' + '    },\n' + '    {\n' + '        "title": "Terminator 2: Judgment Day",\n' + '        "rank": "35",\n' + '        "id": "tt0103064"\n' + '    },\n' + '    {\n' + '        "title": "Saving Private Ryan",\n' + '        "rank": "36",\n' + '        "id": "tt0120815"\n' + '    },\n' + '    {\n' + '        "title": "Memento",\n' + '        "rank": "37",\n' + '        "id": "tt0209144"\n' + '    },\n' + '    {\n' + '        "title": "City Lights",\n' + '        "rank": "38",\n' + '        "id": "tt0021749"\n' + '    },\n' + '    {\n' + '        "title": "Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb",\n' + '        "rank": "39",\n' + '        "id": "tt0057012"\n' + '    },\n' + '    {\n' + '        "title": "Alien",\n' + '        "rank": "40",\n' + '        "id": "tt0078748"\n' + '    },\n' + '    {\n' + '        "title": "Modern Times",\n' + '        "rank": "41",\n' + '        "id": "tt0027977"\n' + '    },\n' + '    {\n' + '        "title": "Spirited Away",\n' + '        "rank": "42",\n' + '        "id": "tt0245429"\n' + '    },\n' + '    {\n' + '        "title": "North by Northwest",\n' + '        "rank": "43",\n' + '        "id": "tt0053125"\n' + '    },\n' + '    {\n' + '        "title": "Back to the Future",\n' + '        "rank": "44",\n' + '        "id": "tt0088763"\n' + '    },\n' + '    {\n' + '        "title": "Life Is Beautiful",\n' + '        "rank": "45",\n' + '        "id": "tt0118799"\n' + '    },\n' + '    {\n' + '        "title": "The Shining",\n' + '        "rank": "46",\n' + '        "id": "tt0081505"\n' + '    },\n' + '    {\n' + '        "title": "The Pianist",\n' + '        "rank": "47",\n' + '        "id": "tt0253474"\n' + '    },\n' + '    {\n' + '        "title": "Citizen Kane",\n' + '        "rank": "48",\n' + '        "id": "tt0033467"\n' + '    },\n' + '    {\n' + '        "title": "The Departed",\n' + '        "rank": "49",\n' + '        "id": "tt0407887"\n' + '    },\n' + '    {\n' + '        "title": "M",\n' + '        "rank": "50",\n' + '        "id": "tt0022100"\n' + '    },\n' + '    {\n' + '        "title": "Paths of Glory",\n' + '        "rank": "51",\n' + '        "id": "tt0050825"\n' + '    },\n' + '    {\n' + '        "title": "Vertigo",\n' + '        "rank": "52",\n' + '        "id": "tt0052357"\n' + '    },\n' + '    {\n' + '        "title": "Django Unchained",\n' + '        "rank": "53",\n' + '        "id": "tt1853728"\n' + '    },\n' + '    {\n' + '        "title": "Double Indemnity",\n' + '        "rank": "54",\n' + '        "id": "tt0036775"\n' + '    },\n' + '    {\n' + '        "title": "The Dark Knight Rises",\n' + '        "rank": "55",\n' + '        "id": "tt1345836"\n' + '    },\n' + '    {\n' + '        "title": "Aliens",\n' + '        "rank": "56",\n' + '        "id": "tt0090605"\n' + '    },\n' + '    {\n' + '        "title": "Taxi Driver",\n' + '        "rank": "57",\n' + '        "id": "tt0075314"\n' + '    },\n' + '    {\n' + '        "title": "American Beauty",\n' + '        "rank": "58",\n' + '        "id": "tt0169547"\n' + '    },\n' + '    {\n' + '        "title": "The Green Mile",\n' + '        "rank": "59",\n' + '        "id": "tt0120689"\n' + '    },\n' + '    {\n' + '        "title": "Gladiator",\n' + '        "rank": "60",\n' + '        "id": "tt0172495"\n' + '    },\n' + '    {\n' + '        "title": "The Intouchables",\n' + '        "rank": "61",\n' + '        "id": "tt1675434"\n' + '    },\n' + '    {\n' + '        "title": "WALL·E",\n' + '        "rank": "62",\n' + '        "id": "tt0910970"\n' + '    },\n' + '    {\n' + '        "title": "The Lives of Others",\n' + '        "rank": "63",\n' + '        "id": "tt0405094"\n' + '    },\n' + '    {\n' + '        "title": "Toy Story 3",\n' + '        "rank": "64",\n' + '        "id": "tt0435761"\n' + '    },\n' + '    {\n' + '        "title": "The Great Dictator",\n' + '        "rank": "65",\n' + '        "id": "tt0032553"\n' + '    },\n' + '    {\n' + '        "title": "The Prestige",\n' + '        "rank": "66",\n' + '        "id": "tt0482571"\n' + '    },\n' + '    {\n' + '        "title": "A Clockwork Orange",\n' + '        "rank": "67",\n' + '        "id": "tt0066921"\n' + '    },\n' + '    {\n' + '        "title": "Lawrence of Arabia",\n' + '        "rank": "68",\n' + '        "id": "tt0056172"\n' + '    },\n' + '    {\n' + '        "title": "Amélie",\n' + '        "rank": "69",\n' + '        "id": "tt0211915"\n' + '    },\n' + '    {\n' + '        "title": "To Kill a Mockingbird",\n' + '        "rank": "70",\n' + '        "id": "tt0056592"\n' + '    },\n' + '    {\n' + '        "title": "Reservoir Dogs",\n' + '        "rank": "71",\n' + '        "id": "tt0105236"\n' + '    },\n' + '    {\n' + '        "title": "Das Boot",\n' + '        "rank": "72",\n' + '        "id": "tt0082096"\n' + '    },\n' + '    {\n' + '        "title": "The Lion King",\n' + '        "rank": "73",\n' + '        "id": "tt0110357"\n' + '    },\n' + '    {\n' + '        "title": "Cinema Paradiso",\n' + '        "rank": "74",\n' + '        "id": "tt0095765"\n' + '    },\n' + '    {\n' + '        "title": "Star Wars: Episode VI - Return of the Jedi",\n' + '        "rank": "75",\n' + '        "id": "tt0086190"\n' + '    },\n' + '    {\n' + '        "title": "The Treasure of the Sierra Madre",\n' + '        "rank": "76",\n' + '        "id": "tt0040897"\n' + '    },\n' + '    {\n' + '        "title": "The Third Man",\n' + '        "rank": "77",\n' + '        "id": "tt0041959"\n' + '    },\n' + '    {\n' + '        "title": "Once Upon a Time in America",\n' + '        "rank": "78",\n' + '        "id": "tt0087843"\n' + '    },\n' + '    {\n' + '        "title": "Requiem for a Dream",\n' + '        "rank": "79",\n' + '        "id": "tt0180093"\n' + '    },\n' + '    {\n' + '        "title": "Eternal Sunshine of the Spotless Mind",\n' + '        "rank": "80",\n' + '        "id": "tt0338013"\n' + '    },\n' + '    {\n' + '        "title": "Full Metal Jacket",\n' + '        "rank": "81",\n' + '        "id": "tt0093058"\n' + '    },\n' + '    {\n' + '        "title": "Oldboy",\n' + '        "rank": "82",\n' + '        "id": "tt0364569"\n' + '    },\n' + '    {\n' + '        "title": "Braveheart",\n' + '        "rank": "83",\n' + '        "id": "tt0112573"\n' + '    },\n' + '    {\n' + '        "title": "L.A. Confidential",\n' + '        "rank": "84",\n' + '        "id": "tt0119488"\n' + '    },\n' + '    {\n' + '        "title": "Bicycle Thieves",\n' + '        "rank": "85",\n' + '        "id": "tt0040522"\n' + '    },\n' + '    {\n' + '        "title": "Chinatown",\n' + '        "rank": "86",\n' + '        "id": "tt0071315"\n' + '    },\n' + '    {\n' + '        "title": "Singin\' in the Rain",\n' + '        "rank": "87",\n' + '        "id": "tt0045152"\n' + '    },\n' + '    {\n' + '        "title": "Princess Mononoke",\n' + '        "rank": "88",\n' + '        "id": "tt0119698"\n' + '    },\n' + '    {\n' + '        "title": "Monty Python and the Holy Grail",\n' + '        "rank": "89",\n' + '        "id": "tt0071853"\n' + '    },\n' + '    {\n' + '        "title": "Metropolis",\n' + '        "rank": "90",\n' + '        "id": "tt0017136"\n' + '    },\n' + '    {\n' + '        "title": "Rashomon",\n' + '        "rank": "91",\n' + '        "id": "tt0042876"\n' + '    },\n' + '    {\n' + '        "title": "Some Like It Hot",\n' + '        "rank": "92",\n' + '        "id": "tt0053291"\n' + '    },\n' + '    {\n' + '        "title": "Amadeus",\n' + '        "rank": "93",\n' + '        "id": "tt0086879"\n' + '    },\n' + '    {\n' + '        "title": "2001: A Space Odyssey",\n' + '        "rank": "94",\n' + '        "id": "tt0062622"\n' + '    },\n' + '    {\n' + '        "title": "All About Eve",\n' + '        "rank": "95",\n' + '        "id": "tt0042192"\n' + '    },\n' + '    {\n' + '        "title": "Witness for the Prosecution",\n' + '        "rank": "96",\n' + '        "id": "tt0051201"\n' + '    },\n' + '    {\n' + '        "title": "The Sting",\n' + '        "rank": "97",\n' + '        "id": "tt0070735"\n' + '    },\n' + '    {\n' + '        "title": "The Apartment",\n' + '        "rank": "98",\n' + '        "id": "tt0053604"\n' + '    },\n' + '    {\n' + '        "title": "Grave of the Fireflies",\n' + '        "rank": "99",\n' + '        "id": "tt0095327"\n' + '    },\n' + '    {\n' + '        "title": "Indiana Jones and the Last Crusade",\n' + '        "rank": "100",\n' + '        "id": "tt0097576"\n' + '    }\n' + ']';

    var obj = JSON.parse(text);
    for (i = 0; i < obj.length; i++) {
        $.ajax({
            url: 'http://www.omdbapi.com/',
            method: 'GET',
            data: {
                //8dd0eb03

                apikey: '74eeabf5',
                i: obj[i]['id']

            },
            success: function success(response) {

                var url = '/admin';
                $.ajax({
                    type: 'POST',

                    url: url,

                    data: response,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function success(response) {

                        console.log(response);
                    }

                });
            }

        });
    }
});

/***/ })

/******/ });