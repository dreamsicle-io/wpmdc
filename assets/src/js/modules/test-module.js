class TestModule {

	constructor(handle = 'script') {
		this.message = `${handle} was bundled properly.`;
	}

	log() {
		// eslint-disable-next-line no-console
		console.log(this.message); 
	}
}

export default TestModule;
