module.exports = {
	globDirectory: 'public/',
	globPatterns: [
		'**/*.{ico,png,jpg,js,json,mp4,css}'
	],
	swDest: 'public/sw.js',
	ignoreURLParametersMatching: [
		/^utm_/,
		/^fbclid$/
	]
};