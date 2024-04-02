const swiper = new Swiper('.swiper', {
	direction: 'horizontal',
	loop: true,
	spaceBetween: 30,
	arrows: false,
	autoplay: {
		delay: 3000,
	},
	pagination: {
		el: '.swiper-pagination',
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	scrollbar: {
		el: '.swiper-scrollbar',
	},
});