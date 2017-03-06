const WEB_URL = 'http://127.0.0.1/project-spg/web';
const testCount = 3;

casper.on("page.error", function(msg, trace) {
	this.echo("Error: " + msg, "ERROR");
});

/**
 * helper function
 */
 
function testAPI(label, command, fn) {
	casper.test.begin(label, 1, function suite(test) {
		casper.start(WEB_URL + "/admin/console/", function() {
			this.sendKeys('#commandline input', command);
			this.click('#issue');
		});
		
		casper.then(function() {
			casper.waitForResource("endpoint.php", function() {
				test.assertEval(function(fn) {
					return fn(__utils__.findOne('#console').textContent);
				}, "Console result is what we'd expect", fn);
			});
		});
		
		casper.run(function() {
			test.done();
		});
	});
}

/**
 * tests
 */
 
casper.test.begin("Console page", 2, function suite(test) {
	casper.start(WEB_URL + "/admin/console/", function() {
		test.assertTitleMatch(/Admin API console/, "Title is what we'd expect");
		test.assertExists("#commandline input");
	});
	
	casper.run(function() {
		test.done();
	});
});

// test the API
testAPI('API: getNodeBySlug', 'getNodeBySlug', function(response) {
	return JSON.parse(response).id == "1";
});

testAPI('API: addPlayer', 'addPlayer Paolo Rossi ITA', function(response) {
	var json = JSON.parse(response);
	return json.id == "1" && json.name == 'Paolo' && json.surname == 'Rossi' && json.country == 'ITA';
});

testAPI('API: addTeam', 'addTeam Cruzeiro BRA', function(response) {
	var json = JSON.parse(response);
	return json.id == "1" && json.teamname == 'Cruzeiro' && json.country == 'BRA';
});

testAPI('API: list players', 'list players', function(response) {
	var json = JSON.parse(response);
	// to do
});

testAPI('API: list teams', 'list teams', function(response) {
	var json = JSON.parse(response);
	// to do
});



