/*! SmartMenus jQuery Plugin - v1.0.0 - January 27, 2016
 * http://www.smartmenus.org/
 * Copyright Vasil Dinkov, Vadikom Web Ltd. http://vadikom.com; Licensed MIT */
(function(t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof module && "object" == typeof module.exports ? module.exports = t(require("jquery")) : t(jQuery)
})(function(t) {
    function i(i) {
        var a = ".smartmenus_mouse";
        if (h || i) h && i && (t(document).unbind(a), h = !1);
        else {
            var u = !0,
                l = null;
            t(document).bind(s([
                ["mousemove", function(i) {
                    var e = {
                        x: i.pageX,
                        y: i.pageY,
                        timeStamp: (new Date).getTime()
                    };
                    if (l) {
                        var s = Math.abs(l.x - e.x),
                            a = Math.abs(l.y - e.y);
                        if ((s > 0 || a > 0) && 2 >= s && 2 >= a && 300 >= e.timeStamp - l.timeStamp && (r = !0, u)) {
                            var n = t(i.target).closest("a");
                            n.is("a") && t.each(o, function() {
                                return t.contains(this.$root[0], n[0]) ? (this.itemEnter({
                                    currentTarget: n[0]
                                }), !1) : void 0
                            }), u = !1
                        }
                    }
                    l = e
                }],
                [n ? "touchstart" : "pointerover pointermove pointerout MSPointerOver MSPointerMove MSPointerOut", function(t) {
                    e(t.originalEvent) && (r = !1)
                }]
            ], a)), h = !0
        }
    }

    function e(t) {
        return !/^(4|mouse)$/.test(t.pointerType)
    }

    function s(i, e) {
        e || (e = "");
        var s = {};
        return t.each(i, function(t, i) {
            s[i[0].split(" ").join(e + " ") + e] = i[1]
        }), s
    }
    var o = [],
        a = !!window.createPopup,
        r = !1,
        n = "ontouchstart" in window,
        h = !1,
        u = window.requestAnimationFrame || function(t) {
            return setTimeout(t, 1e3 / 60)
        },
        l = window.cancelAnimationFrame || function(t) {
            clearTimeout(t)
        };
    return t.SmartMenus = function(i, e) {
        this.$root = t(i), this.opts = e, this.rootId = "", this.accessIdPrefix = "", this.$subArrow = null, this.activatedItems = [], this.visibleSubMenus = [], this.showTimeout = 0, this.hideTimeout = 0, this.scrollTimeout = 0, this.clickActivated = !1, this.focusActivated = !1, this.zIndexInc = 0, this.idInc = 0, this.$firstLink = null, this.$firstSub = null, this.disabled = !1, this.$disableOverlay = null, this.$touchScrollingSub = null, this.cssTransforms3d = "perspective" in i.style || "webkitPerspective" in i.style, this.wasCollapsible = !1, this.init()
    }, t.extend(t.SmartMenus, {
        hideAll: function() {
            t.each(o, function() {
                this.menuHideAll()
            })
        },
        destroy: function() {
            for (; o.length;) o[0].destroy();
            i(!0)
        },
        prototype: {
            init: function(e) {
                var a = this;
                if (!e) {
                    o.push(this), this.rootId = ((new Date).getTime() + Math.random() + "").replace(/\D/g, ""), this.accessIdPrefix = "sm-" + this.rootId + "-", this.$root.hasClass("sm-rtl") && (this.opts.rightToLeftSubMenus = !0);
                    var r = ".smartmenus";
                    this.$root.data("smartmenus", this).attr("data-smartmenus-id", this.rootId).dataSM("level", 1).bind(s([
                        ["mouseover focusin", t.proxy(this.rootOver, this)],
                        ["mouseout focusout", t.proxy(this.rootOut, this)],
                        ["keydown", t.proxy(this.rootKeyDown, this)]
                    ], r)).delegate("a", s([
                        ["mouseenter", t.proxy(this.itemEnter, this)],
                        ["mouseleave", t.proxy(this.itemLeave, this)],
                        ["mousedown", t.proxy(this.itemDown, this)],
                        ["focus", t.proxy(this.itemFocus, this)],
                        ["blur", t.proxy(this.itemBlur, this)],
                        ["click", t.proxy(this.itemClick, this)]
                    ], r)), r += this.rootId, this.opts.hideOnClick && t(document).bind(s([
                        ["touchstart", t.proxy(this.docTouchStart, this)],
                        ["touchmove", t.proxy(this.docTouchMove, this)],
                        ["touchend", t.proxy(this.docTouchEnd, this)],
                        ["click", t.proxy(this.docClick, this)]
                    ], r)), t(window).bind(s([
                        ["resize orientationchange", t.proxy(this.winResize, this)]
                    ], r)), this.opts.subIndicators && (this.$subArrow = t("<span/>").addClass("sub-arrow"), this.opts.subIndicatorsText && this.$subArrow.html(this.opts.subIndicatorsText)), i()
                }
                if (this.$firstSub = this.$root.find("ul").each(function() {
                        a.menuInit(t(this))
                    }).eq(0), this.$firstLink = this.$root.find("a").eq(0), this.opts.markCurrentItem) {
                    var n = /(index|default)\.[^#\?\/]*/i,
                        h = /#.*/,
                        u = window.location.href.replace(n, ""),
                        l = u.replace(h, "");
                    this.$root.find("a").each(function() {
                        var i = this.href.replace(n, ""),
                            e = t(this);
                        (i == u || i == l) && (e.addClass("current"), a.opts.markCurrentTree && e.parentsUntil("[data-smartmenus-id]", "ul").each(function() {
                            t(this).dataSM("parent-a").addClass("current")
                        }))
                    })
                }
                this.wasCollapsible = this.isCollapsible()
            },
            destroy: function(i) {
                if (!i) {
                    var e = ".smartmenus";
                    this.$root.removeData("smartmenus").removeAttr("data-smartmenus-id").removeDataSM("level").unbind(e).undelegate(e), e += this.rootId, t(document).unbind(e), t(window).unbind(e), this.opts.subIndicators && (this.$subArrow = null)
                }
                this.menuHideAll();
                var s = this;
                this.$root.find("ul").each(function() {
                    var i = t(this);
                    i.dataSM("scroll-arrows") && i.dataSM("scroll-arrows").remove(), i.dataSM("shown-before") && ((s.opts.subMenusMinWidth || s.opts.subMenusMaxWidth) && i.css({
                        width: "",
                        minWidth: "",
                        maxWidth: ""
                    }).removeClass("sm-nowrap"), i.dataSM("scroll-arrows") && i.dataSM("scroll-arrows").remove(), i.css({
                        zIndex: "",
                        top: "",
                        left: "",
                        marginLeft: "",
                        marginTop: "",
                        display: ""
                    })), 0 == (i.attr("id") || "").indexOf(s.accessIdPrefix) && i.removeAttr("id")
                }).removeDataSM("in-mega").removeDataSM("shown-before").removeDataSM("ie-shim").removeDataSM("scroll-arrows").removeDataSM("parent-a").removeDataSM("level").removeDataSM("beforefirstshowfired").removeAttr("role").removeAttr("aria-hidden").removeAttr("aria-labelledby").removeAttr("aria-expanded"), this.$root.find("a.has-submenu").each(function() {
                    var i = t(this);
                    0 == i.attr("id").indexOf(s.accessIdPrefix) && i.removeAttr("id")
                }).removeClass("has-submenu").removeDataSM("sub").removeAttr("aria-haspopup").removeAttr("aria-controls").removeAttr("aria-expanded").closest("li").removeDataSM("sub"), this.opts.subIndicators && this.$root.find("span.sub-arrow").remove(), this.opts.markCurrentItem && this.$root.find("a.current").removeClass("current"), i || (this.$root = null, this.$firstLink = null, this.$firstSub = null, this.$disableOverlay && (this.$disableOverlay.remove(), this.$disableOverlay = null), o.splice(t.inArray(this, o), 1))
            },
            disable: function(i) {
                if (!this.disabled) {
                    if (this.menuHideAll(), !i && !this.opts.isPopup && this.$root.is(":visible")) {
                        var e = this.$root.offset();
                        this.$disableOverlay = t('<div class="sm-jquery-disable-overlay"/>').css({
                            position: "absolute",
                            top: e.top,
                            left: e.left,
                            width: this.$root.outerWidth(),
                            height: this.$root.outerHeight(),
                            zIndex: this.getStartZIndex(!0),
                            opacity: 0
                        }).appendTo(document.body)
                    }
                    this.disabled = !0
                }
            },
            docClick: function(i) {
                return this.$touchScrollingSub ? (this.$touchScrollingSub = null, void 0) : ((this.visibleSubMenus.length && !t.contains(this.$root[0], i.target) || t(i.target).is("a")) && this.menuHideAll(), void 0)
            },
            docTouchEnd: function() {
                if (this.lastTouch) {
                    if (!(!this.visibleSubMenus.length || void 0 !== this.lastTouch.x2 && this.lastTouch.x1 != this.lastTouch.x2 || void 0 !== this.lastTouch.y2 && this.lastTouch.y1 != this.lastTouch.y2 || this.lastTouch.target && t.contains(this.$root[0], this.lastTouch.target))) {
                        this.hideTimeout && (clearTimeout(this.hideTimeout), this.hideTimeout = 0);
                        var i = this;
                        this.hideTimeout = setTimeout(function() {
                            i.menuHideAll()
                        }, 350)
                    }
                    this.lastTouch = null
                }
            },
            docTouchMove: function(t) {
                if (this.lastTouch) {
                    var i = t.originalEvent.touches[0];
                    this.lastTouch.x2 = i.pageX, this.lastTouch.y2 = i.pageY
                }
            },
            docTouchStart: function(t) {
                var i = t.originalEvent.touches[0];
                this.lastTouch = {
                    x1: i.pageX,
                    y1: i.pageY,
                    target: i.target
                }
            },
            enable: function() {
                this.disabled && (this.$disableOverlay && (this.$disableOverlay.remove(), this.$disableOverlay = null), this.disabled = !1)
            },
            getClosestMenu: function(i) {
                for (var e = t(i).closest("ul"); e.dataSM("in-mega");) e = e.parent().closest("ul");
                return e[0] || null
            },
            getHeight: function(t) {
                return this.getOffset(t, !0)
            },
            getOffset: function(t, i) {
                var e;
                "none" == t.css("display") && (e = {
                    position: t[0].style.position,
                    visibility: t[0].style.visibility
                }, t.css({
                    position: "absolute",
                    visibility: "hidden"
                }).show());
                var s = t[0].getBoundingClientRect && t[0].getBoundingClientRect(),
                    o = s && (i ? s.height || s.bottom - s.top : s.width || s.right - s.left);
                return o || 0 === o || (o = i ? t[0].offsetHeight : t[0].offsetWidth), e && t.hide().css(e), o
            },
            getStartZIndex: function(t) {
                var i = parseInt(this[t ? "$root" : "$firstSub"].css("z-index"));
                return !t && isNaN(i) && (i = parseInt(this.$root.css("z-index"))), isNaN(i) ? 1 : i
            },
            getTouchPoint: function(t) {
                return t.touches && t.touches[0] || t.changedTouches && t.changedTouches[0] || t
            },
            getViewport: function(t) {
                var i = t ? "Height" : "Width",
                    e = document.documentElement["client" + i],
                    s = window["inner" + i];
                return s && (e = Math.min(e, s)), e
            },
            getViewportHeight: function() {
                return this.getViewport(!0)
            },
            getViewportWidth: function() {
                return this.getViewport()
            },
            getWidth: function(t) {
                return this.getOffset(t)
            },
            handleEvents: function() {
                return !this.disabled && this.isCSSOn()
            },
            handleItemEvents: function(t) {
                return this.handleEvents() && !this.isLinkInMegaMenu(t)
            },
            isCollapsible: function() {
                return "static" == this.$firstSub.css("position")
            },
            isCSSOn: function() {
                return "block" == this.$firstLink.css("display")
            },
            isFixed: function() {
                var i = "fixed" == this.$root.css("position");
                return i || this.$root.parentsUntil("body").each(function() {
                    return "fixed" == t(this).css("position") ? (i = !0, !1) : void 0
                }), i
            },
            isLinkInMegaMenu: function(i) {
                return t(this.getClosestMenu(i[0])).hasClass("mega-menu")
            },
            isTouchMode: function() {
                return !r || this.opts.noMouseOver || this.isCollapsible()
            },
            itemActivate: function(i, e) {
                var s = i.closest("ul"),
                    o = s.dataSM("level");
                if (o > 1 && (!this.activatedItems[o - 2] || this.activatedItems[o - 2][0] != s.dataSM("parent-a")[0])) {
                    var a = this;
                    t(s.parentsUntil("[data-smartmenus-id]", "ul").get().reverse()).add(s).each(function() {
                        a.itemActivate(t(this).dataSM("parent-a"))
                    })
                }
                if ((!this.isCollapsible() || e) && this.menuHideSubMenus(this.activatedItems[o - 1] && this.activatedItems[o - 1][0] == i[0] ? o : o - 1), this.activatedItems[o - 1] = i, this.$root.triggerHandler("activate.smapi", i[0]) !== !1) {
                    var r = i.dataSM("sub");
                    r && (this.isTouchMode() || !this.opts.showOnClick || this.clickActivated) && this.menuShow(r)
                }
            },
            itemBlur: function(i) {
                var e = t(i.currentTarget);
                this.handleItemEvents(e) && this.$root.triggerHandler("blur.smapi", e[0])
            },
            itemClick: function(i) {
                var e = t(i.currentTarget);
                if (this.handleItemEvents(e)) {
                    if (this.$touchScrollingSub && this.$touchScrollingSub[0] == e.closest("ul")[0]) return this.$touchScrollingSub = null, i.stopPropagation(), !1;
                    if (this.$root.triggerHandler("click.smapi", e[0]) === !1) return !1;
                    var s = t(i.target).is("span.sub-arrow"),
                        o = e.dataSM("sub"),
                        a = o ? 2 == o.dataSM("level") : !1;
                    if (o && !o.is(":visible")) {
                        if (this.opts.showOnClick && a && (this.clickActivated = !0), this.itemActivate(e), o.is(":visible")) return this.focusActivated = !0, !1
                    } else if (this.isCollapsible() && s) return this.itemActivate(e), this.menuHide(o), !1;
                    return this.opts.showOnClick && a || e.hasClass("disabled") || this.$root.triggerHandler("select.smapi", e[0]) === !1 ? !1 : void 0
                }
            },
            itemDown: function(i) {
                var e = t(i.currentTarget);
                this.handleItemEvents(e) && e.dataSM("mousedown", !0)
            },
            itemEnter: function(i) {
                var e = t(i.currentTarget);
                if (this.handleItemEvents(e)) {
                    if (!this.isTouchMode()) {
                        this.showTimeout && (clearTimeout(this.showTimeout), this.showTimeout = 0);
                        var s = this;
                        this.showTimeout = setTimeout(function() {
                            s.itemActivate(e)
                        }, this.opts.showOnClick && 1 == e.closest("ul").dataSM("level") ? 1 : this.opts.showTimeout)
                    }
                    this.$root.triggerHandler("mouseenter.smapi", e[0])
                }
            },
            itemFocus: function(i) {
                var e = t(i.currentTarget);
                this.handleItemEvents(e) && (!this.focusActivated || this.isTouchMode() && e.dataSM("mousedown") || this.activatedItems.length && this.activatedItems[this.activatedItems.length - 1][0] == e[0] || this.itemActivate(e, !0), this.$root.triggerHandler("focus.smapi", e[0]))
            },
            itemLeave: function(i) {
                var e = t(i.currentTarget);
                this.handleItemEvents(e) && (this.isTouchMode() || (e[0].blur(), this.showTimeout && (clearTimeout(this.showTimeout), this.showTimeout = 0)), e.removeDataSM("mousedown"), this.$root.triggerHandler("mouseleave.smapi", e[0]))
            },
            menuHide: function(i) {
                if (this.$root.triggerHandler("beforehide.smapi", i[0]) !== !1 && (i.stop(!0, !0), "none" != i.css("display"))) {
                    var e = function() {
                        i.css("z-index", "")
                    };
                    this.isCollapsible() ? this.opts.collapsibleHideFunction ? this.opts.collapsibleHideFunction.call(this, i, e) : i.hide(this.opts.collapsibleHideDuration, e) : this.opts.hideFunction ? this.opts.hideFunction.call(this, i, e) : i.hide(this.opts.hideDuration, e), i.dataSM("ie-shim") && i.dataSM("ie-shim").remove().css({
                        "-webkit-transform": "",
                        transform: ""
                    }), i.dataSM("scroll") && (this.menuScrollStop(i), i.css({
                        "touch-action": "",
                        "-ms-touch-action": "",
                        "-webkit-transform": "",
                        transform: ""
                    }).unbind(".smartmenus_scroll").removeDataSM("scroll").dataSM("scroll-arrows").hide()), i.dataSM("parent-a").removeClass("highlighted").attr("aria-expanded", "false"), i.attr({
                        "aria-expanded": "false",
                        "aria-hidden": "true"
                    });
                    var s = i.dataSM("level");
                    this.activatedItems.splice(s - 1, 1), this.visibleSubMenus.splice(t.inArray(i, this.visibleSubMenus), 1), this.$root.triggerHandler("hide.smapi", i[0])
                }
            },
            menuHideAll: function() {
                this.showTimeout && (clearTimeout(this.showTimeout), this.showTimeout = 0);
                for (var t = this.opts.isPopup ? 1 : 0, i = this.visibleSubMenus.length - 1; i >= t; i--) this.menuHide(this.visibleSubMenus[i]);
                this.opts.isPopup && (this.$root.stop(!0, !0), this.$root.is(":visible") && (this.opts.hideFunction ? this.opts.hideFunction.call(this, this.$root) : this.$root.hide(this.opts.hideDuration), this.$root.dataSM("ie-shim") && this.$root.dataSM("ie-shim").remove())), this.activatedItems = [], this.visibleSubMenus = [], this.clickActivated = !1, this.focusActivated = !1, this.zIndexInc = 0, this.$root.triggerHandler("hideAll.smapi")
            },
            menuHideSubMenus: function(t) {
                for (var i = this.activatedItems.length - 1; i >= t; i--) {
                    var e = this.activatedItems[i].dataSM("sub");
                    e && this.menuHide(e)
                }
            },
            menuIframeShim: function(i) {
                a && this.opts.overlapControlsInIE && !i.dataSM("ie-shim") && i.dataSM("ie-shim", t("<iframe/>").attr({
                    src: "javascript:0",
                    tabindex: -9
                }).css({
                    position: "absolute",
                    top: "auto",
                    left: "0",
                    opacity: 0,
                    border: "0"
                }))
            },
            menuInit: function(t) {
                if (!t.dataSM("in-mega")) {
                    t.hasClass("mega-menu") && t.find("ul").dataSM("in-mega", !0);
                    for (var i = 2, e = t[0];
                        (e = e.parentNode.parentNode) != this.$root[0];) i++;
                    var s = t.prevAll("a").eq(-1);
                    s.length || (s = t.prevAll().find("a").eq(-1)), s.addClass("has-submenu").dataSM("sub", t), t.dataSM("parent-a", s).dataSM("level", i).parent().dataSM("sub", t);
                    var o = s.attr("id") || this.accessIdPrefix + ++this.idInc,
                        a = t.attr("id") || this.accessIdPrefix + ++this.idInc;
                    s.attr({
                        id: o,
                        "aria-haspopup": "true",
                        "aria-controls": a,
                        "aria-expanded": "false"
                    }), t.attr({
                        id: a,
                        role: "group",
                        "aria-hidden": "true",
                        "aria-labelledby": o,
                        "aria-expanded": "false"
                    }), this.opts.subIndicators && s[this.opts.subIndicatorsPos](this.$subArrow.clone())
                }
            },
            menuPosition: function(i) {
                var e, o, a = i.dataSM("parent-a"),
                    r = a.closest("li"),
                    h = r.parent(),
                    u = i.dataSM("level"),
                    l = this.getWidth(i),
                    c = this.getHeight(i),
                    d = a.offset(),
                    m = d.left,
                    p = d.top,
                    f = this.getWidth(a),
                    v = this.getHeight(a),
                    b = t(window),
                    S = b.scrollLeft(),
                    g = b.scrollTop(),
                    M = this.getViewportWidth(),
                    w = this.getViewportHeight(),
                    T = h.parent().is("[data-sm-horizontal-sub]") || 2 == u && !h.hasClass("sm-vertical"),
                    $ = this.opts.rightToLeftSubMenus && !r.is("[data-sm-reverse]") || !this.opts.rightToLeftSubMenus && r.is("[data-sm-reverse]"),
                    y = 2 == u ? this.opts.mainMenuSubOffsetX : this.opts.subMenusSubOffsetX,
                    I = 2 == u ? this.opts.mainMenuSubOffsetY : this.opts.subMenusSubOffsetY;
                if (T ? (e = $ ? f - l - y : y, o = this.opts.bottomToTopSubMenus ? -c - I : v + I) : (e = $ ? y - l : f - y, o = this.opts.bottomToTopSubMenus ? v - I - c : I), this.opts.keepInViewport) {
                    var x = m + e,
                        C = p + o;
                    if ($ && S > x ? e = T ? S - x + e : f - y : !$ && x + l > S + M && (e = T ? S + M - l - x + e : y - l), T || (w > c && C + c > g + w ? o += g + w - c - C : (c >= w || g > C) && (o += g - C)), T && (C + c > g + w + .49 || g > C) || !T && c > w + .49) {
                        var H = this;
                        i.dataSM("scroll-arrows") || i.dataSM("scroll-arrows", t([t('<span class="scroll-up"><span class="scroll-up-arrow"></span></span>')[0], t('<span class="scroll-down"><span class="scroll-down-arrow"></span></span>')[0]]).bind({
                            mouseenter: function() {
                                i.dataSM("scroll").up = t(this).hasClass("scroll-up"), H.menuScroll(i)
                            },
                            mouseleave: function(t) {
                                H.menuScrollStop(i), H.menuScrollOut(i, t)
                            },
                            "mousewheel DOMMouseScroll": function(t) {
                                t.preventDefault()
                            }
                        }).insertAfter(i));
                        var A = ".smartmenus_scroll";
                        i.dataSM("scroll", {
                            y: this.cssTransforms3d ? 0 : o - v,
                            step: 1,
                            itemH: v,
                            subH: c,
                            arrowDownH: this.getHeight(i.dataSM("scroll-arrows").eq(1))
                        }).bind(s([
                            ["mouseover", function(t) {
                                H.menuScrollOver(i, t)
                            }],
                            ["mouseout", function(t) {
                                H.menuScrollOut(i, t)
                            }],
                            ["mousewheel DOMMouseScroll", function(t) {
                                H.menuScrollMousewheel(i, t)
                            }]
                        ], A)).dataSM("scroll-arrows").css({
                            top: "auto",
                            left: "0",
                            marginLeft: e + (parseInt(i.css("border-left-width")) || 0),
                            width: l - (parseInt(i.css("border-left-width")) || 0) - (parseInt(i.css("border-right-width")) || 0),
                            zIndex: i.css("z-index")
                        }).eq(T && this.opts.bottomToTopSubMenus ? 0 : 1).show(), this.isFixed() && i.css({
                            "touch-action": "none",
                            "-ms-touch-action": "none"
                        }).bind(s([
                            [n ? "touchstart touchmove touchend" : "pointerdown pointermove pointerup MSPointerDown MSPointerMove MSPointerUp", function(t) {
                                H.menuScrollTouch(i, t)
                            }]
                        ], A))
                    }
                }
                i.css({
                    top: "auto",
                    left: "0",
                    marginLeft: e,
                    marginTop: o - v
                }), this.menuIframeShim(i), i.dataSM("ie-shim") && i.dataSM("ie-shim").css({
                    zIndex: i.css("z-index"),
                    width: l,
                    height: c,
                    marginLeft: e,
                    marginTop: o - v
                })
            },
            menuScroll: function(t, i, e) {
                var s, o = t.dataSM("scroll"),
                    a = t.dataSM("scroll-arrows"),
                    n = o.up ? o.upEnd : o.downEnd;
                if (!i && o.momentum) {
                    if (o.momentum *= .92, s = o.momentum, .5 > s) return this.menuScrollStop(t), void 0
                } else s = e || (i || !this.opts.scrollAccelerate ? this.opts.scrollStep : Math.floor(o.step));
                var h = t.dataSM("level");
                if (this.activatedItems[h - 1] && this.activatedItems[h - 1].dataSM("sub") && this.activatedItems[h - 1].dataSM("sub").is(":visible") && this.menuHideSubMenus(h - 1), o.y = o.up && o.y >= n || !o.up && n >= o.y ? o.y : Math.abs(n - o.y) > s ? o.y + (o.up ? s : -s) : n, t.add(t.dataSM("ie-shim")).css(this.cssTransforms3d ? {
                        "-webkit-transform": "translate3d(0, " + o.y + "px, 0)",
                        transform: "translate3d(0, " + o.y + "px, 0)"
                    } : {
                        marginTop: o.y
                    }), r && (o.up && o.y > o.downEnd || !o.up && o.y < o.upEnd) && a.eq(o.up ? 1 : 0).show(), o.y == n) r && a.eq(o.up ? 0 : 1).hide(), this.menuScrollStop(t);
                else if (!i) {
                    this.opts.scrollAccelerate && o.step < this.opts.scrollStep && (o.step += .2);
                    var l = this;
                    this.scrollTimeout = u(function() {
                        l.menuScroll(t)
                    })
                }
            },
            menuScrollMousewheel: function(t, i) {
                if (this.getClosestMenu(i.target) == t[0]) {
                    i = i.originalEvent;
                    var e = (i.wheelDelta || -i.detail) > 0;
                    t.dataSM("scroll-arrows").eq(e ? 0 : 1).is(":visible") && (t.dataSM("scroll").up = e, this.menuScroll(t, !0))
                }
                i.preventDefault()
            },
            menuScrollOut: function(i, e) {
                r && (/^scroll-(up|down)/.test((e.relatedTarget || "").className) || (i[0] == e.relatedTarget || t.contains(i[0], e.relatedTarget)) && this.getClosestMenu(e.relatedTarget) == i[0] || i.dataSM("scroll-arrows").css("visibility", "hidden"))
            },
            menuScrollOver: function(i, e) {
                if (r && !/^scroll-(up|down)/.test(e.target.className) && this.getClosestMenu(e.target) == i[0]) {
                    this.menuScrollRefreshData(i);
                    var s = i.dataSM("scroll"),
                        o = t(window).scrollTop() - i.dataSM("parent-a").offset().top - s.itemH;
                    i.dataSM("scroll-arrows").eq(0).css("margin-top", o).end().eq(1).css("margin-top", o + this.getViewportHeight() - s.arrowDownH).end().css("visibility", "visible")
                }
            },
            menuScrollRefreshData: function(i) {
                var e = i.dataSM("scroll"),
                    s = t(window).scrollTop() - i.dataSM("parent-a").offset().top - e.itemH;
                this.cssTransforms3d && (s = -(parseFloat(i.css("margin-top")) - s)), t.extend(e, {
                    upEnd: s,
                    downEnd: s + this.getViewportHeight() - e.subH
                })
            },
            menuScrollStop: function(t) {
                return this.scrollTimeout ? (l(this.scrollTimeout), this.scrollTimeout = 0, t.dataSM("scroll").step = 1, !0) : void 0
            },
            menuScrollTouch: function(i, s) {
                if (s = s.originalEvent, e(s)) {
                    var o = this.getTouchPoint(s);
                    if (this.getClosestMenu(o.target) == i[0]) {
                        var a = i.dataSM("scroll");
                        if (/(start|down)$/i.test(s.type)) this.menuScrollStop(i) ? (s.preventDefault(), this.$touchScrollingSub = i) : this.$touchScrollingSub = null, this.menuScrollRefreshData(i), t.extend(a, {
                            touchStartY: o.pageY,
                            touchStartTime: s.timeStamp
                        });
                        else if (/move$/i.test(s.type)) {
                            var r = void 0 !== a.touchY ? a.touchY : a.touchStartY;
                            if (void 0 !== r && r != o.pageY) {
                                this.$touchScrollingSub = i;
                                var n = o.pageY > r;
                                void 0 !== a.up && a.up != n && t.extend(a, {
                                    touchStartY: o.pageY,
                                    touchStartTime: s.timeStamp
                                }), t.extend(a, {
                                    up: n,
                                    touchY: o.pageY
                                }), this.menuScroll(i, !0, Math.abs(o.pageY - r))
                            }
                            s.preventDefault()
                        } else void 0 !== a.touchY && ((a.momentum = 15 * Math.pow(Math.abs(o.pageY - a.touchStartY) / (s.timeStamp - a.touchStartTime), 2)) && (this.menuScrollStop(i), this.menuScroll(i), s.preventDefault()), delete a.touchY)
                    }
                }
            },
            menuShow: function(t) {
                if ((t.dataSM("beforefirstshowfired") || (t.dataSM("beforefirstshowfired", !0), this.$root.triggerHandler("beforefirstshow.smapi", t[0]) !== !1)) && this.$root.triggerHandler("beforeshow.smapi", t[0]) !== !1 && (t.dataSM("shown-before", !0).stop(!0, !0), !t.is(":visible"))) {
                    var i = t.dataSM("parent-a");
                    if ((this.opts.keepHighlighted || this.isCollapsible()) && i.addClass("highlighted"), this.isCollapsible()) t.removeClass("sm-nowrap").css({
                        zIndex: "",
                        width: "auto",
                        minWidth: "",
                        maxWidth: "",
                        top: "",
                        left: "",
                        marginLeft: "",
                        marginTop: ""
                    });
                    else {
                        if (t.css("z-index", this.zIndexInc = (this.zIndexInc || this.getStartZIndex()) + 1), (this.opts.subMenusMinWidth || this.opts.subMenusMaxWidth) && (t.css({
                                width: "auto",
                                minWidth: "",
                                maxWidth: ""
                            }).addClass("sm-nowrap"), this.opts.subMenusMinWidth && t.css("min-width", this.opts.subMenusMinWidth), this.opts.subMenusMaxWidth)) {
                            var e = this.getWidth(t);
                            t.css("max-width", this.opts.subMenusMaxWidth), e > this.getWidth(t) && t.removeClass("sm-nowrap").css("width", this.opts.subMenusMaxWidth)
                        }
                        this.menuPosition(t), t.dataSM("ie-shim") && t.dataSM("ie-shim").insertBefore(t)
                    }
                    var s = function() {
                        t.css("overflow", "")
                    };
                    this.isCollapsible() ? this.opts.collapsibleShowFunction ? this.opts.collapsibleShowFunction.call(this, t, s) : t.show(this.opts.collapsibleShowDuration, s) : this.opts.showFunction ? this.opts.showFunction.call(this, t, s) : t.show(this.opts.showDuration, s), i.attr("aria-expanded", "true"), t.attr({
                        "aria-expanded": "true",
                        "aria-hidden": "false"
                    }), this.visibleSubMenus.push(t), this.$root.triggerHandler("show.smapi", t[0])
                }
            },
            popupHide: function(t) {
                this.hideTimeout && (clearTimeout(this.hideTimeout), this.hideTimeout = 0);
                var i = this;
                this.hideTimeout = setTimeout(function() {
                    i.menuHideAll()
                }, t ? 1 : this.opts.hideTimeout)
            },
            popupShow: function(t, i) {
                if (!this.opts.isPopup) return alert('SmartMenus jQuery Error:\n\nIf you want to show this menu via the "popupShow" method, set the isPopup:true option.'), void 0;
                if (this.hideTimeout && (clearTimeout(this.hideTimeout), this.hideTimeout = 0), this.$root.dataSM("shown-before", !0).stop(!0, !0), !this.$root.is(":visible")) {
                    this.$root.css({
                        left: t,
                        top: i
                    }), this.menuIframeShim(this.$root), this.$root.dataSM("ie-shim") && this.$root.dataSM("ie-shim").css({
                        zIndex: this.$root.css("z-index"),
                        width: this.getWidth(this.$root),
                        height: this.getHeight(this.$root),
                        left: t,
                        top: i
                    }).insertBefore(this.$root);
                    var e = this,
                        s = function() {
                            e.$root.css("overflow", "")
                        };
                    this.opts.showFunction ? this.opts.showFunction.call(this, this.$root, s) : this.$root.show(this.opts.showDuration, s), this.visibleSubMenus[0] = this.$root
                }
            },
            refresh: function() {
                this.destroy(!0), this.init(!0)
            },
            rootKeyDown: function(i) {
                if (this.handleEvents()) switch (i.keyCode) {
                    case 27:
                        var e = this.activatedItems[0];
                        if (e) {
                            this.menuHideAll(), e[0].focus();
                            var s = e.dataSM("sub");
                            s && this.menuHide(s)
                        }
                        break;
                    case 32:
                        var o = t(i.target);
                        if (o.is("a") && this.handleItemEvents(o)) {
                            var s = o.dataSM("sub");
                            s && !s.is(":visible") && (this.itemClick({
                                currentTarget: i.target
                            }), i.preventDefault())
                        }
                }
            },
            rootOut: function(t) {
                if (this.handleEvents() && !this.isTouchMode() && t.target != this.$root[0] && (this.hideTimeout && (clearTimeout(this.hideTimeout), this.hideTimeout = 0), !this.opts.showOnClick || !this.opts.hideOnClick)) {
                    var i = this;
                    this.hideTimeout = setTimeout(function() {
                        i.menuHideAll()
                    }, this.opts.hideTimeout)
                }
            },
            rootOver: function(t) {
                this.handleEvents() && !this.isTouchMode() && t.target != this.$root[0] && this.hideTimeout && (clearTimeout(this.hideTimeout), this.hideTimeout = 0)
            },
            winResize: function(t) {
                if (this.handleEvents()) {
                    if (!("onorientationchange" in window) || "orientationchange" == t.type) {
                        var i = this.isCollapsible();
                        this.wasCollapsible && i || (this.activatedItems.length && this.activatedItems[this.activatedItems.length - 1][0].blur(), this.menuHideAll()), this.wasCollapsible = i
                    }
                } else if (this.$disableOverlay) {
                    var e = this.$root.offset();
                    this.$disableOverlay.css({
                        top: e.top,
                        left: e.left,
                        width: this.$root.outerWidth(),
                        height: this.$root.outerHeight()
                    })
                }
            }
        }
    }), t.fn.dataSM = function(t, i) {
        return i ? this.data(t + "_smartmenus", i) : this.data(t + "_smartmenus")
    }, t.fn.removeDataSM = function(t) {
        return this.removeData(t + "_smartmenus")
    }, t.fn.smartmenus = function(i) {
        if ("string" == typeof i) {
            var e = arguments,
                s = i;
            return Array.prototype.shift.call(e), this.each(function() {
                var i = t(this).data("smartmenus");
                i && i[s] && i[s].apply(i, e)
            })
        }
        var o = t.extend({}, t.fn.smartmenus.defaults, i);
        return this.each(function() {
            new t.SmartMenus(this, o)
        })
    }, t.fn.smartmenus.defaults = {
        isPopup: !1,
        mainMenuSubOffsetX: 0,
        mainMenuSubOffsetY: 0,
        subMenusSubOffsetX: 0,
        subMenusSubOffsetY: 0,
        subMenusMinWidth: "10em",
        subMenusMaxWidth: "20em",
        subIndicators: !0,
        subIndicatorsPos: "prepend",
        subIndicatorsText: "+",
        scrollStep: 30,
        scrollAccelerate: !0,
        showTimeout: 250,
        hideTimeout: 500,
        showDuration: 0,
        showFunction: null,
        hideDuration: 0,
        hideFunction: function(t, i) {
            t.fadeOut(200, i)
        },
        collapsibleShowDuration: 0,
        collapsibleShowFunction: function(t, i) {
            t.slideDown(200, i)
        },
        collapsibleHideDuration: 0,
        collapsibleHideFunction: function(t, i) {
            t.slideUp(200, i)
        },
        showOnClick: !1,
        hideOnClick: !0,
        noMouseOver: !1,
        keepInViewport: !0,
        keepHighlighted: !0,
        markCurrentItem: !1,
        markCurrentTree: !0,
        rightToLeftSubMenus: !1,
        bottomToTopSubMenus: !1,
        overlapControlsInIE: !0
    }, t
});

/*!
 * SmartMenus jQuery Plugin Bootstrap Addon - v0.3.0 - January 27, 2016
 * http://www.smartmenus.org/
 *
 * Copyright Vasil Dinkov, Vadikom Web Ltd.
 * http://vadikom.com
 *
 * Licensed MIT
 */

(function(factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery', 'jquery.smartmenus'], factory);
    } else if (typeof module === 'object' && typeof module.exports === 'object') {
        // CommonJS
        module.exports = factory(require('jquery'));
    } else {
        // Global jQuery
        factory(jQuery);
    }
} (function($) {

    $.extend($.SmartMenus.Bootstrap = {}, {
        keydownFix: false,
        init: function() {
            // init all navbars that don't have the "data-sm-skip" attribute set
            var $navbars = $('ul.navbar-nav:not([data-sm-skip])');
            $navbars.each(function() {
                var $this = $(this),
                    obj = $this.data('smartmenus');
                // if this navbar is not initialized
                if (!obj) {
                    $this.smartmenus({

                            // these are some good default options that should work for all
                            // you can, of course, tweak these as you like
                            subMenusSubOffsetX: 2,
                            subMenusSubOffsetY: -6,
                            subIndicators: false,
                            collapsibleShowFunction: null,
                            collapsibleHideFunction: null,
                            rightToLeftSubMenus: $this.hasClass('navbar-right'),
                            bottomToTopSubMenus: $this.closest('.navbar').hasClass('navbar-fixed-bottom')
                        })
                        .bind({
                            // set/unset proper Bootstrap classes for some menu elements
                            'show.smapi': function(e, menu) {
                                var $menu = $(menu),
                                    $scrollArrows = $menu.dataSM('scroll-arrows');
                                if ($scrollArrows) {
                                    // they inherit border-color from body, so we can use its background-color too
                                    $scrollArrows.css('background-color', $(document.body).css('background-color'));
                                }
                                $menu.parent().addClass('open');
                            },
                            'hide.smapi': function(e, menu) {
                                $(menu).parent().removeClass('open');
                            }
                        });

                    function onInit() {
                        // set Bootstrap's "active" class to SmartMenus "current" items (should someone decide to enable markCurrentItem: true)
                        $this.find('a.current').parent().addClass('active');
                        // remove any Bootstrap required attributes that might cause conflicting issues with the SmartMenus script
                        $this.find('a.has-submenu').each(function() {
                            var $this = $(this);
                            if ($this.is('[data-toggle="dropdown"]')) {
                                $this.dataSM('bs-data-toggle-dropdown', true).removeAttr('data-toggle');
                            }
                            if ($this.is('[role="button"]')) {
                                $this.dataSM('bs-role-button', true).removeAttr('role');
                            }
                        });
                    }

                    onInit();

                    function onBeforeDestroy() {
                        $this.find('a.current').parent().removeClass('active');
                        $this.find('a.has-submenu').each(function() {
                            var $this = $(this);
                            if ($this.dataSM('bs-data-toggle-dropdown')) {
                                $this.attr('data-toggle', 'dropdown').removeDataSM('bs-data-toggle-dropdown');
                            }
                            if ($this.dataSM('bs-role-button')) {
                                $this.attr('role', 'button').removeDataSM('bs-role-button');
                            }
                        });
                    }

                    obj = $this.data('smartmenus');

                    // custom "isCollapsible" method for Bootstrap
                    obj.isCollapsible = function() {
                        return !/^(left|right)$/.test(this.$firstLink.parent().css('float'));
                    };

                    // custom "refresh" method for Bootstrap
                    obj.refresh = function() {
                        $.SmartMenus.prototype.refresh.call(this);
                        onInit();
                        // update collapsible detection
                        detectCollapsible(true);
                    }

                    // custom "destroy" method for Bootstrap
                    obj.destroy = function(refresh) {
                        onBeforeDestroy();
                        $.SmartMenus.prototype.destroy.call(this, refresh);
                    }

                    // keep Bootstrap's default behavior for parent items when the "data-sm-skip-collapsible-behavior" attribute is set to the ul.navbar-nav
                    // i.e. use the whole item area just as a sub menu toggle and don't customize the carets
                    if ($this.is('[data-sm-skip-collapsible-behavior]')) {
                        $this.bind({
                            // click the parent item to toggle the sub menus (and reset deeper levels and other branches on click)
                            'click.smapi': function(e, item) {
                                if (obj.isCollapsible()) {
                                    var $item = $(item),
                                        $sub = $item.parent().dataSM('sub');
                                    if ($sub && $sub.dataSM('shown-before') && $sub.is(':visible')) {
                                        obj.itemActivate($item);
                                        obj.menuHide($sub);
                                        return false;
                                    }
                                }
                            }
                        });
                    }

                    // onresize detect when the navbar becomes collapsible and add it the "sm-collapsible" class
                    var winW;
                    function detectCollapsible(force) {
                        var newW = obj.getViewportWidth();
                        if (newW != winW || force) {
                            var $carets = $this.find('.caret');
                            if (obj.isCollapsible()) {
                                $this.addClass('sm-collapsible');
                                // set "navbar-toggle" class to carets (so they look like a button) if the "data-sm-skip-collapsible-behavior" attribute is not set to the ul.navbar-nav
                                if (!$this.is('[data-sm-skip-collapsible-behavior]')) {
                                    $carets.addClass('navbar-toggle sub-arrow');
                                }
                            } else {
                                $this.removeClass('sm-collapsible');
                                if (!$this.is('[data-sm-skip-collapsible-behavior]')) {
                                    $carets.removeClass('navbar-toggle sub-arrow');
                                }
                            }
                            winW = newW;
                        }
                    };
                    detectCollapsible();
                    $(window).bind('resize.smartmenus' + obj.rootId, detectCollapsible);
                }
            });
            // keydown fix for Bootstrap 3.3.5+ conflict
            if ($navbars.length && !$.SmartMenus.Bootstrap.keydownFix) {
                // unhook BS keydown handler for all dropdowns
                $(document).off('keydown.bs.dropdown.data-api', '.dropdown-menu');
                // restore BS keydown handler for dropdowns that are not inside SmartMenus navbars
                if ($.fn.dropdown && $.fn.dropdown.Constructor) {
                    $(document).on('keydown.bs.dropdown.data-api', '.dropdown-menu:not([id^="sm-"])', $.fn.dropdown.Constructor.prototype.keydown);
                }
                $.SmartMenus.Bootstrap.keydownFix = true;
            }
        }
    });

    // init ondomready
    $($.SmartMenus.Bootstrap.init);

    return $;
}));

jQuery(document).ready(function() {

//------------------------------------------
    //scroll-top
//------------------------------------------
  jQuery(".ti_scroll").hide();   
    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 500) {
                jQuery('.ti_scroll').fadeIn();
            } else {
                jQuery('.ti_scroll').fadeOut();
            }
        });     
        jQuery('a.ti_scroll').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    }); 
  });  