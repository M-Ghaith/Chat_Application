'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var amountOfColors = 18; // Or "participants"

var container = document.getElementById('chat-container');
var lineWidth = 500;
var profileImgWidth = 60;
var textWidth = lineWidth - 20 - profileImgWidth - 10;
var chats = [];
var maxTexts = 4;

function _createElement() {
	var opts = arguments.length <= 0 || arguments[0] === undefined ? {} : arguments[0];

	var ele = document.createElement('div');
	if ('class' in opts) {
		var _ele$classList;

		if (!Array.isArray(opts.class)) {
			opts.class = [opts.class];
		}
		(_ele$classList = ele.classList).add.apply(_ele$classList, opts.class);
	}
	return ele;
}

function addChat() {
	var chat = new Chat();
	chats.push(chat);
	setTimeout(function () {
		return chat.loop();
	}, 200);
	return chat;
}

var Chat = function () {
	function Chat() {
		_classCallCheck(this, Chat);

		this.ele = _createElement({ class: 'chat' });
		this.lines = [];
		this.anim = null;
		container.appendChild(this.ele);
	}

	Chat.prototype.addLine = function addLine() {
		var l = new Line();
		this.lines.push(l);
		this.ele.appendChild(l.ele.lineContainer);
		return l;
	};

	Chat.prototype.removeOldest = function removeOldest() {
		var _this = this;

		var maxCount = Math.ceil(window.innerHeight / 1080 * 12);
		if (this.lines.length > maxCount) {
			console.log(maxCount - this.lines.length);
			var oldest = this.lines.splice(0, this.lines.length - maxCount);
			oldest.forEach(function (n) {
				return _this.ele.removeChild(n.ele.lineContainer);
			});
		}
	};

	Chat.prototype.loop = function loop() {
		var _this2 = this;

		if (this.anim) {
			this.stopLoop();
		}
		this.addLine();
		this.removeOldest();
		this.anim = setTimeout(function () {
			return _this2.loop();
		}, Math.random() * 1300 + 180);
	};

	Chat.prototype.stopLoop = function stopLoop() {
		clearTimeout(this.anim);
		this.anim = null;
	};

	return Chat;
}();

var Line = function () {
	function Line() {
		_classCallCheck(this, Line);

		this.pickColor();
		this.pickName();
		this.pickText();
		this.pickHasImg();
		this.pickHasRichBody();
		this.setupElements();
		this.animateIn();
	}

	Line.prototype.pickColor = function pickColor() {
		this.hue = Math.floor(Math.random() * amountOfColors) * (360 / amountOfColors);
		this.color = 'hsl(' + this.hue + ', 90%, 50%)';
		this.profileImgColor = 'hsl(' + this.hue + ', 40%, 55%)';
		return this.hue;
	};

	Line.prototype.pickName = function pickName() {
		this.name = Math.max(0.3, Math.random());
	};

	Line.prototype.pickText = function pickText() {
		var lengthChoice = Math.random();
		var lengthWeight = 1;
		if (lengthChoice < 0.5) {
			lengthWeight = 0.6;
		} else if (lengthChoice < 0.9) {
			lengthWeight = 0.8;
		}
		this.length = Math.max(0.02, lengthChoice * lengthWeight);
		this.textCount = this.length * maxTexts;
	};

	Line.prototype.pickHasImg = function pickHasImg() {
		this.hasImg = Math.random() > 0.9;
	};

	Line.prototype.pickHasRichBody = function pickHasRichBody() {
		this.hasRichBody = !this.hasImage && Math.random() > 0.85;
	};

	Line.prototype.setupElements = function setupElements() {
		var _this3 = this;

		var ele = this.createElement();
		this.ele = ele;
		ele.name.style.width = this.name * (textWidth / 2) + 'px';
		ele.texts.forEach(function (n, i, arr) {
			var w = textWidth;
			if (i === arr.length - 1) {
				w = Math.max(0.2, _this3.textCount - i) * textWidth;
			}
			n.style.width = w + 'px';
		});
		ele.name.style.backgroundColor = this.color;
		ele.profileImg.style.backgroundColor = this.profileImgColor;
	};

	Line.prototype.animateIn = function animateIn() {
		var delay = 35; // Some times it won't animate correctly without this
		var ele = this.ele;
		setTimeout(function () {
			ele.lineContainer.style.opacity = 1;
			ele.lineContainer.style.maxHeight = '200px';
			ele.lineContainer.style.transform = 'translateX(0px) scale(1)';
		}, delay);

		var otherEleList = [ele.profileImg, ele.name].concat(ele.texts);

		if ('img' in ele) {
			otherEleList.push(ele.img);
		} else if ('richBody' in ele) {
			otherEleList.push(ele.richBody);
		}

		delay += 40;

		otherEleList.forEach(function (e, i) {
			setTimeout(function () {
				e.style.opacity = 1;
				e.style.transform = 'translateY(0px)';
			}, delay += 50);
		});

		ele.texts.forEach(function (n, i, arr) {
			return setTimeout(function () {
				return n.style.opacity = 1;
			}, 70 * (i + 3) + delay);
		});
	};

	Line.prototype.createElement = function createElement() {
		var lineContainer = _createElement({ class: 'line-container' });
		var line = _createElement({ class: 'line' });
		var profileImg = _createElement({ class: 'profile-img' });
		var body = _createElement({ class: 'body' });
		var name = _createElement({ class: 'name' });
		var texts = [];
		var img = _createElement({ class: 'img' });
		var richBody = _createElement({ class: 'rich-body' });
		body.appendChild(name);
		for (var i = 0; i < (this.textCount || 1); i++) {
			var text = _createElement({ class: 'text' });
			texts.push(text);
			body.appendChild(text);
		}
		line.appendChild(profileImg);
		line.appendChild(body);
		lineContainer.appendChild(line);
		var out = { lineContainer: lineContainer, line: line, profileImg: profileImg, body: body, name: name, texts: texts };
		this.hasImg && (out.img = img) && body.appendChild(img);
		this.hasRichBody && (out.richBody = richBody) && body.appendChild(richBody);
		return out;
	};

	return Line;
}();

function loop() {
	chats.forEach(function (n) {
		return n.loop();
	});
}

function stopLoop() {
	chats.forEach(function (n) {
		return n.stopLoop();
	});
}

(function () {
	return addChat();
})();