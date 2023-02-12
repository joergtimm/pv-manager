import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['select', 'check', 'formcontent', 'editable', 'newInplace']
    connect() {

        this.editableTarget.addEventListener("change", () => {

            if (this.editableTarget.checked) {
                this.newInplaceTarget.classList.remove('d-none');
            } else {
                this.newInplaceTarget.classList.add('d-none');
            }
        });
    }

    selectStorage(event) {

        this.selectTargets.forEach((element) => {
            element.classList.remove('selected-storage')
        })

        event.currentTarget.classList.add('selected-storage');


    }
}
