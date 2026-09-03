document.addEventListener('DOMContentLoaded', function () {
	var links = document.querySelectorAll('a[href^="#"]');
	links.forEach(function (link) {
		link.addEventListener('click', function (e) {
			var targetId = link.getAttribute('href').slice(1);
			var target = document.getElementById(targetId);
			if (!target) return;
			e.preventDefault();

			var startY = window.scrollY;
			var endY = target.getBoundingClientRect().top + window.scrollY;
			var duration = 1500; // milisegundos — súbelo para más lento, bájalo para más rápido
			var startTime = null;

			function easeInOutQuad(t) {
				return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
			}

			function step(timestamp) {
				if (!startTime) startTime = timestamp;
				var elapsed = timestamp - startTime;
				var progress = Math.min(elapsed / duration, 1);
				window.scrollTo(0, startY + (endY - startY) * easeInOutQuad(progress));
				if (progress < 1) {
					requestAnimationFrame(step);
				}
			}

			requestAnimationFrame(step);
		});
	});
});