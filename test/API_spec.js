var testCount = 3;

casper.on("page.error", function(msg, trace) {
	this.echo("Error: " + msg, "ERROR");
});

// [begin] Starts a suite of <planned> tests (if defined). 
// The suite callback will get the current Tester instance as its first argument
casper.test.begin("Testing API", testCount, function suite(test) {
	// [start] Configures and starts Casper, then opens the provided url and optionally adds the step provided by the then argument
	casper.start("http://127.0.0.1/project-spg/web/admin/console/", function() {
		test.assertTitleMatch(/Admin API console/, "Title is what we'd expect");
		test.assertExists("#commandline");
		this.sendKeys('#commandline', 'getNodeBySlug');
		this.click('#issue');
	});
	
	casper.then(function() {
		casper.waitForResource("endpoint.php", function() {
			test.assertEval(function() {
				return JSON.parse(__utils__.findOne('#console').textContent).id == "1";
			});
		});
	});
	
	casper.run(function() {
		// [done()] must be called in order to terminate the suite. 
		// This is specially important when doing asynchronous tests so ensure it’s called when everything has actually been performed.
		test.done();
	});
});

