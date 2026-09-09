document.addEventListener('wpcf7mailsent', function () {
	var modal = document.getElementById('hostlab-thank-you-modal');
	if (modal) {
		modal.classList.add('is-open');
	}
}, false);

document.addEventListener('DOMContentLoaded', function () {
	var modal = document.getElementById('hostlab-thank-you-modal');
	var closeBtn = document.getElementById('hostlab-modal-close');
	if (!modal || !closeBtn) return;

	function closeModal() {
		modal.classList.remove('is-open');
	}

	closeBtn.addEventListener('click', closeModal);
	modal.addEventListener('click', function (e) {
		if (e.target === modal) {
			closeModal();
		}
	});
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape') {
			closeModal();
		}
	});
});