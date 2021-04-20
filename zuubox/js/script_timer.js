var ScriptTimer = function() {
	this.clock = (typeof window.performance !== 'undefined') ? window.performance : window.Date;

	this.start = this.clock.now();

	this.stop = function() {
		var elapsed = this.clock.now() - this.start;

		return elapsed;
	};
};