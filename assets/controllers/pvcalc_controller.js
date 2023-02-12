import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
	static targets = ['handle'];
	static values = {
		sortUrl: String,
	}

	connect() {


	}
}