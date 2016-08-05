function progress(a, b) {
    var c = a * b.width() / 100;
    b.find(".progressbar-value").animate({
        width: c
    }, 1200)
}

function swither_resizer() {
    var a = $(window).height();
    $("#theme-switcher-wrapper").height(a / 1.4)
}! function(a, b, c) {
    "use strict";

    function d(c) {
        if (e = b.documentElement, f = b.body, S(), gb = this, c = c || {}, lb = c.constants || {}, c.easing)
            for (var d in c.easing) V[d] = c.easing[d];
        sb = c.edgeStrategy || "set", jb = {
            beforerender: c.beforerender,
            render: c.render,
            keyframe: c.keyframe
        }, kb = c.forceHeight !== !1, kb && (Jb = c.scale || 1), mb = c.mobileDeceleration || y, ob = c.smoothScrolling !== !1, pb = c.smoothScrollingDuration || z, qb = {
            targetTop: gb.getScrollTop()
        }, Rb = (c.mobileCheck || function() {
            return /Android|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent || navigator.vendor || a.opera)
        })(), Rb ? (ib = b.getElementById("skrollr-body"), ib && fb(), W(), Db(e, [s, v], [t])) : Db(e, [s, u], [t]), gb.refresh(), vb(a, "resize orientationchange", function() {
            var a = e.clientWidth,
                b = e.clientHeight;
            (b !== Ob || a !== Nb) && (Ob = b, Nb = a, Pb = !0)
        });
        var g = T();
        return function h() {
            Z(), ub = g(h)
        }(), gb
    }
    var e, f, g = {
            get: function() {
                return gb
            },
            init: function(a) {
                return gb || new d(a)
            },
            VERSION: "0.6.26"
        }, h = Object.prototype.hasOwnProperty,
        i = a.Math,
        j = a.getComputedStyle,
        k = "touchstart",
        l = "touchmove",
        m = "touchcancel",
        n = "touchend",
        o = "skrollable",
        p = o + "-before",
        q = o + "-between",
        r = o + "-after",
        s = "skrollr",
        t = "no-" + s,
        u = s + "-desktop",
        v = s + "-mobile",
        w = "linear",
        x = 1e3,
        y = .004,
        z = 200,
        A = "start",
        B = "end",
        C = "center",
        D = "bottom",
        E = "___skrollable_id",
        F = /^(?:input|textarea|button|select)$/i,
        G = /^\s+|\s+$/g,
        H = /^data(?:-(_\w+))?(?:-?(-?\d*\.?\d+p?))?(?:-?(start|end|top|center|bottom))?(?:-?(top|center|bottom))?$/,
        I = /\s*(@?[\w\-\[\]]+)\s*:\s*(.+?)\s*(?:;|$)/gi,
        J = /^(@?[a-z\-]+)\[(\w+)\]$/,
        K = /-([a-z0-9_])/g,
        L = function(a, b) {
            return b.toUpperCase()
        }, M = /[\-+]?[\d]*\.?[\d]+/g,
        N = /\{\?\}/g,
        O = /rgba?\(\s*-?\d+\s*,\s*-?\d+\s*,\s*-?\d+/g,
        P = /[a-z\-]+-gradient/g,
        Q = "",
        R = "",
        S = function() {
            var a = /^(?:O|Moz|webkit|ms)|(?:-(?:o|moz|webkit|ms)-)/;
            if (j) {
                var b = j(f, null);
                for (var c in b)
                    if (Q = c.match(a) || +c == c && b[c].match(a)) break;
                if (!Q) return void(Q = R = "");
                Q = Q[0], "-" === Q.slice(0, 1) ? (R = Q, Q = {
                    "-webkit-": "webkit",
                    "-moz-": "Moz",
                    "-ms-": "ms",
                    "-o-": "O"
                }[Q]) : R = "-" + Q.toLowerCase() + "-"
            }
        }, T = function() {
            var b = a.requestAnimationFrame || a[Q.toLowerCase() + "RequestAnimationFrame"],
                c = Gb();
            return (Rb || !b) && (b = function(b) {
                var d = Gb() - c,
                    e = i.max(0, 1e3 / 60 - d);
                return a.setTimeout(function() {
                    c = Gb(), b()
                }, e)
            }), b
        }, U = function() {
            var b = a.cancelAnimationFrame || a[Q.toLowerCase() + "CancelAnimationFrame"];
            return (Rb || !b) && (b = function(b) {
                return a.clearTimeout(b)
            }), b
        }, V = {
            begin: function() {
                return 0
            },
            end: function() {
                return 1
            },
            linear: function(a) {
                return a
            },
            quadratic: function(a) {
                return a * a
            },
            cubic: function(a) {
                return a * a * a
            },
            swing: function(a) {
                return -i.cos(a * i.PI) / 2 + .5
            },
            sqrt: function(a) {
                return i.sqrt(a)
            },
            outCubic: function(a) {
                return i.pow(a - 1, 3) + 1
            },
            bounce: function(a) {
                var b;
                if (.5083 >= a) b = 3;
                else if (.8489 >= a) b = 9;
                else if (.96208 >= a) b = 27;
                else {
                    if (!(.99981 >= a)) return 1;
                    b = 91
                }
                return 1 - i.abs(3 * i.cos(a * b * 1.028) / b)
            }
        };
    d.prototype.refresh = function(a) {
        var d, e, f = !1;
        for (a === c ? (f = !0, hb = [], Qb = 0, a = b.getElementsByTagName("*")) : a.length === c && (a = [a]), d = 0, e = a.length; e > d; d++) {
            var g = a[d],
                h = g,
                i = [],
                j = ob,
                k = sb,
                l = !1;
            if (f && E in g && delete g[E], g.attributes) {
                for (var m = 0, n = g.attributes.length; n > m; m++) {
                    var p = g.attributes[m];
                    if ("data-anchor-target" !== p.name)
                        if ("data-smooth-scrolling" !== p.name)
                            if ("data-edge-strategy" !== p.name)
                                if ("data-emit-events" !== p.name) {
                                    var q = p.name.match(H);
                                    if (null !== q) {
                                        var r = {
                                            props: p.value,
                                            element: g,
                                            eventType: p.name.replace(K, L)
                                        };
                                        i.push(r);
                                        var s = q[1];
                                        s && (r.constant = s.substr(1));
                                        var t = q[2];
                                        /p$/.test(t) ? (r.isPercentage = !0, r.offset = (0 | t.slice(0, -1)) / 100) : r.offset = 0 | t;
                                        var u = q[3],
                                            v = q[4] || u;
                                        u && u !== A && u !== B ? (r.mode = "relative", r.anchors = [u, v]) : (r.mode = "absolute", u === B ? r.isEnd = !0 : r.isPercentage || (r.offset = r.offset * Jb))
                                    }
                                } else l = !0;
                                else k = p.value;
                                else j = "off" !== p.value;
                                else if (h = b.querySelector(p.value), null === h) throw 'Unable to find anchor target "' + p.value + '"'
                }
                if (i.length) {
                    var w, x, y;
                    !f && E in g ? (y = g[E], w = hb[y].styleAttr, x = hb[y].classAttr) : (y = g[E] = Qb++, w = g.style.cssText, x = Cb(g)), hb[y] = {
                        element: g,
                        styleAttr: w,
                        classAttr: x,
                        anchorTarget: h,
                        keyFrames: i,
                        smoothScrolling: j,
                        edgeStrategy: k,
                        emitEvents: l,
                        lastFrameIndex: -1
                    }, Db(g, [o], [])
                }
            }
        }
        for (zb(), d = 0, e = a.length; e > d; d++) {
            var z = hb[a[d][E]];
            z !== c && ($(z), ab(z))
        }
        return gb
    }, d.prototype.relativeToAbsolute = function(a, b, c) {
        var d = e.clientHeight,
            f = a.getBoundingClientRect(),
            g = f.top,
            h = f.bottom - f.top;
        return b === D ? g -= d : b === C && (g -= d / 2), c === D ? g += h : c === C && (g += h / 2), g += gb.getScrollTop(), g + .5 | 0
    }, d.prototype.animateTo = function(a, b) {
        b = b || {};
        var d = Gb(),
            e = gb.getScrollTop();
        return nb = {
            startTop: e,
            topDiff: a - e,
            targetTop: a,
            duration: b.duration || x,
            startTime: d,
            endTime: d + (b.duration || x),
            easing: V[b.easing || w],
            done: b.done
        }, nb.topDiff || (nb.done && nb.done.call(gb, !1), nb = c), gb
    }, d.prototype.stopAnimateTo = function() {
        nb && nb.done && nb.done.call(gb, !0), nb = c
    }, d.prototype.isAnimatingTo = function() {
        return !!nb
    }, d.prototype.isMobile = function() {
        return Rb
    }, d.prototype.setScrollTop = function(b, c) {
        return rb = c === !0, Rb ? Sb = i.min(i.max(b, 0), Ib) : a.scrollTo(0, b), gb
    }, d.prototype.getScrollTop = function() {
        return Rb ? Sb : a.pageYOffset || e.scrollTop || f.scrollTop || 0
    }, d.prototype.getMaxScrollTop = function() {
        return Ib
    }, d.prototype.on = function(a, b) {
        return jb[a] = b, gb
    }, d.prototype.off = function(a) {
        return delete jb[a], gb
    }, d.prototype.destroy = function() {
        var a = U();
        a(ub), xb(), Db(e, [t], [s, u, v]);
        for (var b = 0, d = hb.length; d > b; b++) eb(hb[b].element);
        e.style.overflow = f.style.overflow = "", e.style.height = f.style.height = "", ib && g.setStyle(ib, "transform", "none"), gb = c, ib = c, jb = c, kb = c, Ib = 0, Jb = 1, lb = c, mb = c, Kb = "down", Lb = -1, Nb = 0, Ob = 0, Pb = !1, nb = c, ob = c, pb = c, qb = c, rb = c, Qb = 0, sb = c, Rb = !1, Sb = 0, tb = c
    };
    var W = function() {
        var d, g, h, j, o, p, q, r, s, t, u, v;
        vb(e, [k, l, m, n].join(" "), function(a) {
            var e = a.changedTouches[0];
            for (j = a.target; 3 === j.nodeType;) j = j.parentNode;
            switch (o = e.clientY, p = e.clientX, t = a.timeStamp, F.test(j.tagName) || a.preventDefault(), a.type) {
                case k:
                    d && d.blur(), gb.stopAnimateTo(), d = j, g = q = o, h = p, s = t;
                    break;
                case l:
                    F.test(j.tagName) && b.activeElement !== j && a.preventDefault(), r = o - q, v = t - u, gb.setScrollTop(Sb - r, !0), q = o, u = t;
                    break;
                default:
                case m:
                case n:
                    var f = g - o,
                        w = h - p,
                        x = w * w + f * f;
                    if (49 > x) {
                        if (!F.test(d.tagName)) {
                            d.focus();
                            var y = b.createEvent("MouseEvents");
                            y.initMouseEvent("click", !0, !0, a.view, 1, e.screenX, e.screenY, e.clientX, e.clientY, a.ctrlKey, a.altKey, a.shiftKey, a.metaKey, 0, null), d.dispatchEvent(y)
                        }
                        return
                    }
                    d = c;
                    var z = r / v;
                    z = i.max(i.min(z, 3), -3);
                    var A = i.abs(z / mb),
                        B = z * A + .5 * mb * A * A,
                        C = gb.getScrollTop() - B,
                        D = 0;
                    C > Ib ? (D = (Ib - C) / B, C = Ib) : 0 > C && (D = -C / B, C = 0), A *= 1 - D, gb.animateTo(C + .5 | 0, {
                        easing: "outCubic",
                        duration: A
                    })
            }
        }), a.scrollTo(0, 0), e.style.overflow = f.style.overflow = "hidden"
    }, X = function() {
            var a, b, c, d, f, g, h, j, k, l, m, n = e.clientHeight,
                o = Ab();
            for (j = 0, k = hb.length; k > j; j++)
                for (a = hb[j], b = a.element, c = a.anchorTarget, d = a.keyFrames, f = 0, g = d.length; g > f; f++) h = d[f], l = h.offset, m = o[h.constant] || 0, h.frame = l, h.isPercentage && (l *= n, h.frame = l), "relative" === h.mode && (eb(b), h.frame = gb.relativeToAbsolute(c, h.anchors[0], h.anchors[1]) - l, eb(b, !0)), h.frame += m, kb && !h.isEnd && h.frame > Ib && (Ib = h.frame);
            for (Ib = i.max(Ib, Bb()), j = 0, k = hb.length; k > j; j++) {
                for (a = hb[j], d = a.keyFrames, f = 0, g = d.length; g > f; f++) h = d[f], m = o[h.constant] || 0, h.isEnd && (h.frame = Ib - h.offset + m);
                a.keyFrames.sort(Hb)
            }
        }, Y = function(a, b) {
            for (var c = 0, d = hb.length; d > c; c++) {
                var e, f, i = hb[c],
                    j = i.element,
                    k = i.smoothScrolling ? a : b,
                    l = i.keyFrames,
                    m = l.length,
                    n = l[0],
                    s = l[l.length - 1],
                    t = k < n.frame,
                    u = k > s.frame,
                    v = t ? n : s,
                    w = i.emitEvents,
                    x = i.lastFrameIndex;
                if (t || u) {
                    if (t && -1 === i.edge || u && 1 === i.edge) continue;
                    switch (t ? (Db(j, [p], [r, q]), w && x > -1 && (yb(j, n.eventType, Kb), i.lastFrameIndex = -1)) : (Db(j, [r], [p, q]), w && m > x && (yb(j, s.eventType, Kb), i.lastFrameIndex = m)), i.edge = t ? -1 : 1, i.edgeStrategy) {
                        case "reset":
                            eb(j);
                            continue;
                        case "ease":
                            k = v.frame;
                            break;
                        default:
                        case "set":
                            var y = v.props;
                            for (e in y) h.call(y, e) && (f = db(y[e].value), 0 === e.indexOf("@") ? j.setAttribute(e.substr(1), f) : g.setStyle(j, e, f));
                            continue
                    }
                } else 0 !== i.edge && (Db(j, [o, q], [p, r]), i.edge = 0);
                for (var z = 0; m - 1 > z; z++)
                    if (k >= l[z].frame && k <= l[z + 1].frame) {
                        var A = l[z],
                            B = l[z + 1];
                        for (e in A.props)
                            if (h.call(A.props, e)) {
                                var C = (k - A.frame) / (B.frame - A.frame);
                                C = A.props[e].easing(C), f = cb(A.props[e].value, B.props[e].value, C), f = db(f), 0 === e.indexOf("@") ? j.setAttribute(e.substr(1), f) : g.setStyle(j, e, f)
                            }
                        w && x !== z && ("down" === Kb ? yb(j, A.eventType, Kb) : yb(j, B.eventType, Kb), i.lastFrameIndex = z);
                        break
                    }
            }
        }, Z = function() {
            Pb && (Pb = !1, zb());
            var a, b, d = gb.getScrollTop(),
                e = Gb();
            if (nb) e >= nb.endTime ? (d = nb.targetTop, a = nb.done, nb = c) : (b = nb.easing((e - nb.startTime) / nb.duration), d = nb.startTop + b * nb.topDiff | 0), gb.setScrollTop(d, !0);
            else if (!rb) {
                var f = qb.targetTop - d;
                f && (qb = {
                    startTop: Lb,
                    topDiff: d - Lb,
                    targetTop: d,
                    startTime: Mb,
                    endTime: Mb + pb
                }), e <= qb.endTime && (b = V.sqrt((e - qb.startTime) / pb), d = qb.startTop + b * qb.topDiff | 0)
            }
            if (Rb && ib && g.setStyle(ib, "transform", "translate(0, " + -Sb + "px) " + tb), rb || Lb !== d) {
                Kb = d > Lb ? "down" : Lb > d ? "up" : Kb, rb = !1;
                var h = {
                    curTop: d,
                    lastTop: Lb,
                    maxTop: Ib,
                    direction: Kb
                }, i = jb.beforerender && jb.beforerender.call(gb, h);
                i !== !1 && (Y(d, gb.getScrollTop()), Lb = d, jb.render && jb.render.call(gb, h)), a && a.call(gb, !1)
            }
            Mb = e
        }, $ = function(a) {
            for (var b = 0, c = a.keyFrames.length; c > b; b++) {
                for (var d, e, f, g, h = a.keyFrames[b], i = {}; null !== (g = I.exec(h.props));) f = g[1], e = g[2], d = f.match(J), null !== d ? (f = d[1], d = d[2]) : d = w, e = e.indexOf("!") ? _(e) : [e.slice(1)], i[f] = {
                    value: e,
                    easing: V[d]
                };
                h.props = i
            }
        }, _ = function(a) {
            var b = [];
            return O.lastIndex = 0, a = a.replace(O, function(a) {
                return a.replace(M, function(a) {
                    return a / 255 * 100 + "%"
                })
            }), R && (P.lastIndex = 0, a = a.replace(P, function(a) {
                return R + a
            })), a = a.replace(M, function(a) {
                return b.push(+a), "{?}"
            }), b.unshift(a), b
        }, ab = function(a) {
            var b, c, d = {};
            for (b = 0, c = a.keyFrames.length; c > b; b++) bb(a.keyFrames[b], d);
            for (d = {}, b = a.keyFrames.length - 1; b >= 0; b--) bb(a.keyFrames[b], d)
        }, bb = function(a, b) {
            var c;
            for (c in b) h.call(a.props, c) || (a.props[c] = b[c]);
            for (c in a.props) b[c] = a.props[c]
        }, cb = function(a, b, c) {
            var d, e = a.length;
            if (e !== b.length) throw "Can't interpolate between \"" + a[0] + '" and "' + b[0] + '"';
            var f = [a[0]];
            for (d = 1; e > d; d++) f[d] = a[d] + (b[d] - a[d]) * c;
            return f
        }, db = function(a) {
            var b = 1;
            return N.lastIndex = 0, a[0].replace(N, function() {
                return a[b++]
            })
        }, eb = function(a, b) {
            a = [].concat(a);
            for (var c, d, e = 0, f = a.length; f > e; e++) d = a[e], c = hb[d[E]], c && (b ? (d.style.cssText = c.dirtyStyleAttr, Db(d, c.dirtyClassAttr)) : (c.dirtyStyleAttr = d.style.cssText, c.dirtyClassAttr = Cb(d), d.style.cssText = c.styleAttr, Db(d, c.classAttr)))
        }, fb = function() {
            tb = "translateZ(0)", g.setStyle(ib, "transform", tb);
            var a = j(ib),
                b = a.getPropertyValue("transform"),
                c = a.getPropertyValue(R + "transform"),
                d = b && "none" !== b || c && "none" !== c;
            d || (tb = "")
        };
    g.setStyle = function(a, b, c) {
        var d = a.style;
        if (b = b.replace(K, L).replace("-", ""), "zIndex" === b) d[b] = isNaN(c) ? c : "" + (0 | c);
        else if ("float" === b) d.styleFloat = d.cssFloat = c;
        else try {
            Q && (d[Q + b.slice(0, 1).toUpperCase() + b.slice(1)] = c), d[b] = c
        } catch (e) {}
    };
    var gb, hb, ib, jb, kb, lb, mb, nb, ob, pb, qb, rb, sb, tb, ub, vb = g.addEvent = function(b, c, d) {
            var e = function(b) {
                return b = b || a.event, b.target || (b.target = b.srcElement), b.preventDefault || (b.preventDefault = function() {
                    b.returnValue = !1, b.defaultPrevented = !0
                }), d.call(this, b)
            };
            c = c.split(" ");
            for (var f, g = 0, h = c.length; h > g; g++) f = c[g], b.addEventListener ? b.addEventListener(f, d, !1) : b.attachEvent("on" + f, e), Tb.push({
                element: b,
                name: f,
                listener: d
            })
        }, wb = g.removeEvent = function(a, b, c) {
            b = b.split(" ");
            for (var d = 0, e = b.length; e > d; d++) a.removeEventListener ? a.removeEventListener(b[d], c, !1) : a.detachEvent("on" + b[d], c)
        }, xb = function() {
            for (var a, b = 0, c = Tb.length; c > b; b++) a = Tb[b], wb(a.element, a.name, a.listener);
            Tb = []
        }, yb = function(a, b, c) {
            jb.keyframe && jb.keyframe.call(gb, a, b, c)
        }, zb = function() {
            var a = gb.getScrollTop();
            Ib = 0, kb && !Rb && (f.style.height = ""), X(), kb && !Rb && (f.style.height = Ib + e.clientHeight + "px"), Rb ? gb.setScrollTop(i.min(gb.getScrollTop(), Ib)) : gb.setScrollTop(a, !0), rb = !0
        }, Ab = function() {
            var a, b, c = e.clientHeight,
                d = {};
            for (a in lb) b = lb[a], "function" == typeof b ? b = b.call(gb) : /p$/.test(b) && (b = b.slice(0, -1) / 100 * c), d[a] = b;
            return d
        }, Bb = function() {
            var a = ib && ib.offsetHeight || 0,
                b = i.max(a, f.scrollHeight, f.offsetHeight, e.scrollHeight, e.offsetHeight, e.clientHeight);
            return b - e.clientHeight
        }, Cb = function(b) {
            var c = "className";
            return a.SVGElement && b instanceof a.SVGElement && (b = b[c], c = "baseVal"), b[c]
        }, Db = function(b, d, e) {
            var f = "className";
            if (a.SVGElement && b instanceof a.SVGElement && (b = b[f], f = "baseVal"), e === c) return void(b[f] = d);
            for (var g = b[f], h = 0, i = e.length; i > h; h++) g = Fb(g).replace(Fb(e[h]), " ");
            g = Eb(g);
            for (var j = 0, k = d.length; k > j; j++) - 1 === Fb(g).indexOf(Fb(d[j])) && (g += " " + d[j]);
            b[f] = Eb(g)
        }, Eb = function(a) {
            return a.replace(G, "")
        }, Fb = function(a) {
            return " " + a + " "
        }, Gb = Date.now || function() {
            return +new Date
        }, Hb = function(a, b) {
            return a.frame - b.frame
        }, Ib = 0,
        Jb = 1,
        Kb = "down",
        Lb = -1,
        Mb = Gb(),
        Nb = 0,
        Ob = 0,
        Pb = !1,
        Qb = 0,
        Rb = !1,
        Sb = 0,
        Tb = [];
    "function" == typeof define && define.amd ? define("skrollr", function() {
        return g
    }) : "undefined" != typeof module && module.exports ? module.exports = g : a.skrollr = g
}(window, document), "function" != typeof Object.create && (Object.create = function(a) {
    function b() {}
    return b.prototype = a, new b
}),
function(a, b, c) {
    var d = {
        init: function(b, c) {
            var d = this;
            d.$elem = a(c), d.options = a.extend({}, a.fn.owlCarousel.options, d.$elem.data(), b), d.userOptions = b, d.loadContent()
        },
        loadContent: function() {
            function b(a) {
                var b, c = "";
                if ("function" == typeof d.options.jsonSuccess) d.options.jsonSuccess.apply(this, [a]);
                else {
                    for (b in a.owl) a.owl.hasOwnProperty(b) && (c += a.owl[b].item);
                    d.$elem.html(c)
                }
                d.logIn()
            }
            var c, d = this;
            "function" == typeof d.options.beforeInit && d.options.beforeInit.apply(this, [d.$elem]), "string" == typeof d.options.jsonPath ? (c = d.options.jsonPath, a.getJSON(c, b)) : d.logIn()
        },
        logIn: function() {
            var a = this;
            a.$elem.data("owl-originalStyles", a.$elem.attr("style")), a.$elem.data("owl-originalClasses", a.$elem.attr("class")), a.$elem.css({
                opacity: 0
            }), a.orignalItems = a.options.items, a.checkBrowser(), a.wrapperWidth = 0, a.checkVisible = null, a.setVars()
        },
        setVars: function() {
            var a = this;
            return 0 === a.$elem.children().length ? !1 : (a.baseClass(), a.eventTypes(), a.$userItems = a.$elem.children(), a.itemsAmount = a.$userItems.length, a.wrapItems(), a.$owlItems = a.$elem.find(".owl-item"), a.$owlWrapper = a.$elem.find(".owl-wrapper"), a.playDirection = "next", a.prevItem = 0, a.prevArr = [0], a.currentItem = 0, a.customEvents(), void a.onStartup())
        },
        onStartup: function() {
            var a = this;
            a.updateItems(), a.calculateAll(), a.buildControls(), a.updateControls(), a.response(), a.moveEvents(), a.stopOnHover(), a.owlStatus(), a.options.transitionStyle !== !1 && a.transitionTypes(a.options.transitionStyle), a.options.autoPlay === !0 && (a.options.autoPlay = 5e3), a.play(), a.$elem.find(".owl-wrapper").css("display", "block"), a.$elem.is(":visible") ? a.$elem.css("opacity", 1) : a.watchVisibility(), a.onstartup = !1, a.eachMoveUpdate(), "function" == typeof a.options.afterInit && a.options.afterInit.apply(this, [a.$elem])
        },
        eachMoveUpdate: function() {
            var a = this;
            a.options.lazyLoad === !0 && a.lazyLoad(), a.options.autoHeight === !0 && a.autoHeight(), a.onVisibleItems(), "function" == typeof a.options.afterAction && a.options.afterAction.apply(this, [a.$elem])
        },
        updateVars: function() {
            var a = this;
            "function" == typeof a.options.beforeUpdate && a.options.beforeUpdate.apply(this, [a.$elem]), a.watchVisibility(), a.updateItems(), a.calculateAll(), a.updatePosition(), a.updateControls(), a.eachMoveUpdate(), "function" == typeof a.options.afterUpdate && a.options.afterUpdate.apply(this, [a.$elem])
        },
        reload: function() {
            var a = this;
            b.setTimeout(function() {
                a.updateVars()
            }, 0)
        },
        watchVisibility: function() {
            var a = this;
            return a.$elem.is(":visible") !== !1 ? !1 : (a.$elem.css({
                opacity: 0
            }), b.clearInterval(a.autoPlayInterval), b.clearInterval(a.checkVisible), void(a.checkVisible = b.setInterval(function() {
                a.$elem.is(":visible") && (a.reload(), a.$elem.animate({
                    opacity: 1
                }, 200), b.clearInterval(a.checkVisible))
            }, 500)))
        },
        wrapItems: function() {
            var a = this;
            a.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>'), a.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">'), a.wrapperOuter = a.$elem.find(".owl-wrapper-outer"), a.$elem.css("display", "block")
        },
        baseClass: function() {
            var a = this,
                b = a.$elem.hasClass(a.options.baseClass),
                c = a.$elem.hasClass(a.options.theme);
            b || a.$elem.addClass(a.options.baseClass), c || a.$elem.addClass(a.options.theme)
        },
        updateItems: function() {
            var b, c, d = this;
            if (d.options.responsive === !1) return !1;
            if (d.options.singleItem === !0) return d.options.items = d.orignalItems = 1, d.options.itemsCustom = !1, d.options.itemsDesktop = !1, d.options.itemsDesktopSmall = !1, d.options.itemsTablet = !1, d.options.itemsTabletSmall = !1, d.options.itemsMobile = !1, !1;
            if (b = a(d.options.responsiveBaseWidth).width(), b > (d.options.itemsDesktop[0] || d.orignalItems) && (d.options.items = d.orignalItems), d.options.itemsCustom !== !1)
                for (d.options.itemsCustom.sort(function(a, b) {
                    return a[0] - b[0]
                }), c = 0; c < d.options.itemsCustom.length; c += 1) d.options.itemsCustom[c][0] <= b && (d.options.items = d.options.itemsCustom[c][1]);
            else b <= d.options.itemsDesktop[0] && d.options.itemsDesktop !== !1 && (d.options.items = d.options.itemsDesktop[1]), b <= d.options.itemsDesktopSmall[0] && d.options.itemsDesktopSmall !== !1 && (d.options.items = d.options.itemsDesktopSmall[1]), b <= d.options.itemsTablet[0] && d.options.itemsTablet !== !1 && (d.options.items = d.options.itemsTablet[1]), b <= d.options.itemsTabletSmall[0] && d.options.itemsTabletSmall !== !1 && (d.options.items = d.options.itemsTabletSmall[1]), b <= d.options.itemsMobile[0] && d.options.itemsMobile !== !1 && (d.options.items = d.options.itemsMobile[1]);
            d.options.items > d.itemsAmount && d.options.itemsScaleUp === !0 && (d.options.items = d.itemsAmount)
        },
        response: function() {
            var c, d, e = this;
            return e.options.responsive !== !0 ? !1 : (d = a(b).width(), e.resizer = function() {
                a(b).width() !== d && (e.options.autoPlay !== !1 && b.clearInterval(e.autoPlayInterval), b.clearTimeout(c), c = b.setTimeout(function() {
                    d = a(b).width(), e.updateVars()
                }, e.options.responsiveRefreshRate))
            }, void a(b).resize(e.resizer))
        },
        updatePosition: function() {
            var a = this;
            a.jumpTo(a.currentItem), a.options.autoPlay !== !1 && a.checkAp()
        },
        appendItemsSizes: function() {
            var b = this,
                c = 0,
                d = b.itemsAmount - b.options.items;
            b.$owlItems.each(function(e) {
                var f = a(this);
                f.css({
                    width: b.itemWidth
                }).data("owl-item", Number(e)), (e % b.options.items === 0 || e === d) && (e > d || (c += 1)), f.data("owl-roundPages", c)
            })
        },
        appendWrapperSizes: function() {
            var a = this,
                b = a.$owlItems.length * a.itemWidth;
            a.$owlWrapper.css({
                width: 2 * b,
                left: 0
            }), a.appendItemsSizes()
        },
        calculateAll: function() {
            var a = this;
            a.calculateWidth(), a.appendWrapperSizes(), a.loops(), a.max()
        },
        calculateWidth: function() {
            var a = this;
            a.itemWidth = Math.round(a.$elem.width() / a.options.items)
        },
        max: function() {
            var a = this,
                b = -1 * (a.itemsAmount * a.itemWidth - a.options.items * a.itemWidth);
            return a.options.items > a.itemsAmount ? (a.maximumItem = 0, b = 0, a.maximumPixels = 0) : (a.maximumItem = a.itemsAmount - a.options.items, a.maximumPixels = b), b
        },
        min: function() {
            return 0
        },
        loops: function() {
            var b, c, d, e = this,
                f = 0,
                g = 0;
            for (e.positionsInArray = [0], e.pagesInArray = [], b = 0; b < e.itemsAmount; b += 1) g += e.itemWidth, e.positionsInArray.push(-g), e.options.scrollPerPage === !0 && (c = a(e.$owlItems[b]), d = c.data("owl-roundPages"), d !== f && (e.pagesInArray[f] = e.positionsInArray[b], f = d))
        },
        buildControls: function() {
            var b = this;
            (b.options.navigation === !0 || b.options.pagination === !0) && (b.owlControls = a('<div class="owl-controls"/>').toggleClass("clickable", !b.browser.isTouch).appendTo(b.$elem)), b.options.pagination === !0 && b.buildPagination(), b.options.navigation === !0 && b.buildButtons()
        },
        buildButtons: function() {
            var b = this,
                c = a('<div class="owl-buttons"/>');
            b.owlControls.append(c), b.buttonPrev = a("<div/>", {
                "class": "owl-prev",
                html: b.options.navigationText[0] || ""
            }), b.buttonNext = a("<div/>", {
                "class": "owl-next",
                html: b.options.navigationText[1] || ""
            }), c.append(b.buttonPrev).append(b.buttonNext), c.on("touchstart.owlControls mousedown.owlControls", 'div[class^="owl"]', function(a) {
                a.preventDefault()
            }), c.on("touchend.owlControls mouseup.owlControls", 'div[class^="owl"]', function(c) {
                c.preventDefault(), a(this).hasClass("owl-next") ? b.next() : b.prev()
            })
        },
        buildPagination: function() {
            var b = this;
            b.paginationWrapper = a('<div class="owl-pagination"/>'), b.owlControls.append(b.paginationWrapper), b.paginationWrapper.on("touchend.owlControls mouseup.owlControls", ".owl-page", function(c) {
                c.preventDefault(), Number(a(this).data("owl-page")) !== b.currentItem && b.goTo(Number(a(this).data("owl-page")), !0)
            })
        },
        updatePagination: function() {
            var b, c, d, e, f, g, h = this;
            if (h.options.pagination === !1) return !1;
            for (h.paginationWrapper.html(""), b = 0, c = h.itemsAmount - h.itemsAmount % h.options.items, e = 0; e < h.itemsAmount; e += 1) e % h.options.items === 0 && (b += 1, c === e && (d = h.itemsAmount - h.options.items), f = a("<div/>", {
                "class": "owl-page"
            }), g = a("<span></span>", {
                text: h.options.paginationNumbers === !0 ? b : "",
                "class": h.options.paginationNumbers === !0 ? "owl-numbers" : ""
            }), f.append(g), f.data("owl-page", c === e ? d : e), f.data("owl-roundPages", b), h.paginationWrapper.append(f));
            h.checkPagination()
        },
        checkPagination: function() {
            var b = this;
            return b.options.pagination === !1 ? !1 : void b.paginationWrapper.find(".owl-page").each(function() {
                a(this).data("owl-roundPages") === a(b.$owlItems[b.currentItem]).data("owl-roundPages") && (b.paginationWrapper.find(".owl-page").removeClass("active"), a(this).addClass("active"))
            })
        },
        checkNavigation: function() {
            var a = this;
            return a.options.navigation === !1 ? !1 : void(a.options.rewindNav === !1 && (0 === a.currentItem && 0 === a.maximumItem ? (a.buttonPrev.addClass("disabled"), a.buttonNext.addClass("disabled")) : 0 === a.currentItem && 0 !== a.maximumItem ? (a.buttonPrev.addClass("disabled"), a.buttonNext.removeClass("disabled")) : a.currentItem === a.maximumItem ? (a.buttonPrev.removeClass("disabled"), a.buttonNext.addClass("disabled")) : 0 !== a.currentItem && a.currentItem !== a.maximumItem && (a.buttonPrev.removeClass("disabled"), a.buttonNext.removeClass("disabled"))))
        },
        updateControls: function() {
            var a = this;
            a.updatePagination(), a.checkNavigation(), a.owlControls && (a.options.items >= a.itemsAmount ? a.owlControls.hide() : a.owlControls.show())
        },
        destroyControls: function() {
            var a = this;
            a.owlControls && a.owlControls.remove()
        },
        next: function(a) {
            var b = this;
            if (b.isTransition) return !1;
            if (b.currentItem += b.options.scrollPerPage === !0 ? b.options.items : 1, b.currentItem > b.maximumItem + (b.options.scrollPerPage === !0 ? b.options.items - 1 : 0)) {
                if (b.options.rewindNav !== !0) return b.currentItem = b.maximumItem, !1;
                b.currentItem = 0, a = "rewind"
            }
            b.goTo(b.currentItem, a)
        },
        prev: function(a) {
            var b = this;
            if (b.isTransition) return !1;
            if (b.options.scrollPerPage === !0 && b.currentItem > 0 && b.currentItem < b.options.items ? b.currentItem = 0 : b.currentItem -= b.options.scrollPerPage === !0 ? b.options.items : 1, b.currentItem < 0) {
                if (b.options.rewindNav !== !0) return b.currentItem = 0, !1;
                b.currentItem = b.maximumItem, a = "rewind"
            }
            b.goTo(b.currentItem, a)
        },
        goTo: function(a, c, d) {
            var e, f = this;
            return f.isTransition ? !1 : ("function" == typeof f.options.beforeMove && f.options.beforeMove.apply(this, [f.$elem]), a >= f.maximumItem ? a = f.maximumItem : 0 >= a && (a = 0), f.currentItem = f.owl.currentItem = a, f.options.transitionStyle !== !1 && "drag" !== d && 1 === f.options.items && f.browser.support3d === !0 ? (f.swapSpeed(0), f.browser.support3d === !0 ? f.transition3d(f.positionsInArray[a]) : f.css2slide(f.positionsInArray[a], 1), f.afterGo(), f.singleItemTransition(), !1) : (e = f.positionsInArray[a], f.browser.support3d === !0 ? (f.isCss3Finish = !1, c === !0 ? (f.swapSpeed("paginationSpeed"), b.setTimeout(function() {
                f.isCss3Finish = !0
            }, f.options.paginationSpeed)) : "rewind" === c ? (f.swapSpeed(f.options.rewindSpeed), b.setTimeout(function() {
                f.isCss3Finish = !0
            }, f.options.rewindSpeed)) : (f.swapSpeed("slideSpeed"), b.setTimeout(function() {
                f.isCss3Finish = !0
            }, f.options.slideSpeed)), f.transition3d(e)) : c === !0 ? f.css2slide(e, f.options.paginationSpeed) : "rewind" === c ? f.css2slide(e, f.options.rewindSpeed) : f.css2slide(e, f.options.slideSpeed), void f.afterGo()))
        },
        jumpTo: function(a) {
            var b = this;
            "function" == typeof b.options.beforeMove && b.options.beforeMove.apply(this, [b.$elem]), a >= b.maximumItem || -1 === a ? a = b.maximumItem : 0 >= a && (a = 0), b.swapSpeed(0), b.browser.support3d === !0 ? b.transition3d(b.positionsInArray[a]) : b.css2slide(b.positionsInArray[a], 1), b.currentItem = b.owl.currentItem = a, b.afterGo()
        },
        afterGo: function() {
            var a = this;
            a.prevArr.push(a.currentItem), a.prevItem = a.owl.prevItem = a.prevArr[a.prevArr.length - 2], a.prevArr.shift(0), a.prevItem !== a.currentItem && (a.checkPagination(), a.checkNavigation(), a.eachMoveUpdate(), a.options.autoPlay !== !1 && a.checkAp()), "function" == typeof a.options.afterMove && a.prevItem !== a.currentItem && a.options.afterMove.apply(this, [a.$elem])
        },
        stop: function() {
            var a = this;
            a.apStatus = "stop", b.clearInterval(a.autoPlayInterval)
        },
        checkAp: function() {
            var a = this;
            "stop" !== a.apStatus && a.play()
        },
        play: function() {
            var a = this;
            return a.apStatus = "play", a.options.autoPlay === !1 ? !1 : (b.clearInterval(a.autoPlayInterval), void(a.autoPlayInterval = b.setInterval(function() {
                a.next(!0)
            }, a.options.autoPlay)))
        },
        swapSpeed: function(a) {
            var b = this;
            "slideSpeed" === a ? b.$owlWrapper.css(b.addCssSpeed(b.options.slideSpeed)) : "paginationSpeed" === a ? b.$owlWrapper.css(b.addCssSpeed(b.options.paginationSpeed)) : "string" != typeof a && b.$owlWrapper.css(b.addCssSpeed(a))
        },
        addCssSpeed: function(a) {
            return {
                "-webkit-transition": "all " + a + "ms ease",
                "-moz-transition": "all " + a + "ms ease",
                "-o-transition": "all " + a + "ms ease",
                transition: "all " + a + "ms ease"
            }
        },
        removeTransition: function() {
            return {
                "-webkit-transition": "",
                "-moz-transition": "",
                "-o-transition": "",
                transition: ""
            }
        },
        doTranslate: function(a) {
            return {
                "-webkit-transform": "translate3d(" + a + "px, 0px, 0px)",
                "-moz-transform": "translate3d(" + a + "px, 0px, 0px)",
                "-o-transform": "translate3d(" + a + "px, 0px, 0px)",
                "-ms-transform": "translate3d(" + a + "px, 0px, 0px)",
                transform: "translate3d(" + a + "px, 0px,0px)"
            }
        },
        transition3d: function(a) {
            var b = this;
            b.$owlWrapper.css(b.doTranslate(a))
        },
        css2move: function(a) {
            var b = this;
            b.$owlWrapper.css({
                left: a
            })
        },
        css2slide: function(a, b) {
            var c = this;
            c.isCssFinish = !1, c.$owlWrapper.stop(!0, !0).animate({
                left: a
            }, {
                duration: b || c.options.slideSpeed,
                complete: function() {
                    c.isCssFinish = !0
                }
            })
        },
        checkBrowser: function() {
            var a, d, e, f, g = this,
                h = "translate3d(0px, 0px, 0px)",
                i = c.createElement("div");
            i.style.cssText = "  -moz-transform:" + h + "; -ms-transform:" + h + "; -o-transform:" + h + "; -webkit-transform:" + h + "; transform:" + h, a = /translate3d\(0px, 0px, 0px\)/g, d = i.style.cssText.match(a), e = null !== d && 1 === d.length, f = "ontouchstart" in b || b.navigator.msMaxTouchPoints, g.browser = {
                support3d: e,
                isTouch: f
            }
        },
        moveEvents: function() {
            var a = this;
            (a.options.mouseDrag !== !1 || a.options.touchDrag !== !1) && (a.gestures(), a.disabledEvents())
        },
        eventTypes: function() {
            var a = this,
                b = ["s", "e", "x"];
            a.ev_types = {}, a.options.mouseDrag === !0 && a.options.touchDrag === !0 ? b = ["touchstart.owl mousedown.owl", "touchmove.owl mousemove.owl", "touchend.owl touchcancel.owl mouseup.owl"] : a.options.mouseDrag === !1 && a.options.touchDrag === !0 ? b = ["touchstart.owl", "touchmove.owl", "touchend.owl touchcancel.owl"] : a.options.mouseDrag === !0 && a.options.touchDrag === !1 && (b = ["mousedown.owl", "mousemove.owl", "mouseup.owl"]), a.ev_types.start = b[0], a.ev_types.move = b[1], a.ev_types.end = b[2]
        },
        disabledEvents: function() {
            var b = this;
            b.$elem.on("dragstart.owl", function(a) {
                a.preventDefault()
            }), b.$elem.on("mousedown.disableTextSelect", function(b) {
                return a(b.target).is("input, textarea, select, option")
            })
        },
        gestures: function() {
            function d(a) {
                if (void 0 !== a.touches) return {
                    x: a.touches[0].pageX,
                    y: a.touches[0].pageY
                };
                if (void 0 === a.touches) {
                    if (void 0 !== a.pageX) return {
                        x: a.pageX,
                        y: a.pageY
                    };
                    if (void 0 === a.pageX) return {
                        x: a.clientX,
                        y: a.clientY
                    }
                }
            }

            function e(b) {
                "on" === b ? (a(c).on(i.ev_types.move, g), a(c).on(i.ev_types.end, h)) : "off" === b && (a(c).off(i.ev_types.move), a(c).off(i.ev_types.end))
            }

            function f(c) {
                var f, g = c.originalEvent || c || b.event;
                if (3 === g.which) return !1;
                if (!(i.itemsAmount <= i.options.items)) {
                    if (i.isCssFinish === !1 && !i.options.dragBeforeAnimFinish) return !1;
                    if (i.isCss3Finish === !1 && !i.options.dragBeforeAnimFinish) return !1;
                    i.options.autoPlay !== !1 && b.clearInterval(i.autoPlayInterval), i.browser.isTouch === !0 || i.$owlWrapper.hasClass("grabbing") || i.$owlWrapper.addClass("grabbing"), i.newPosX = 0, i.newRelativeX = 0, a(this).css(i.removeTransition()), f = a(this).position(), j.relativePos = f.left, j.offsetX = d(g).x - f.left, j.offsetY = d(g).y - f.top, e("on"), j.sliding = !1, j.targetElement = g.target || g.srcElement
                }
            }

            function g(e) {
                var f, g, h = e.originalEvent || e || b.event;
                i.newPosX = d(h).x - j.offsetX, i.newPosY = d(h).y - j.offsetY, i.newRelativeX = i.newPosX - j.relativePos, "function" == typeof i.options.startDragging && j.dragging !== !0 && 0 !== i.newRelativeX && (j.dragging = !0, i.options.startDragging.apply(i, [i.$elem])), (i.newRelativeX > 8 || i.newRelativeX < -8) && i.browser.isTouch === !0 && (void 0 !== h.preventDefault ? h.preventDefault() : h.returnValue = !1, j.sliding = !0), (i.newPosY > 10 || i.newPosY < -10) && j.sliding === !1 && a(c).off("touchmove.owl"), f = function() {
                    return i.newRelativeX / 5
                }, g = function() {
                    return i.maximumPixels + i.newRelativeX / 5
                }, i.newPosX = Math.max(Math.min(i.newPosX, f()), g()), i.browser.support3d === !0 ? i.transition3d(i.newPosX) : i.css2move(i.newPosX)
            }

            function h(c) {
                var d, f, g, h = c.originalEvent || c || b.event;
                h.target = h.target || h.srcElement, j.dragging = !1, i.browser.isTouch !== !0 && i.$owlWrapper.removeClass("grabbing"), i.dragDirection = i.owl.dragDirection = i.newRelativeX < 0 ? "left" : "right", 0 !== i.newRelativeX && (d = i.getNewPosition(), i.goTo(d, !1, "drag"), j.targetElement === h.target && i.browser.isTouch !== !0 && (a(h.target).on("click.disable", function(b) {
                    b.stopImmediatePropagation(), b.stopPropagation(), b.preventDefault(), a(b.target).off("click.disable")
                }), f = a._data(h.target, "events").click, g = f.pop(), f.splice(0, 0, g))), e("off")
            }
            var i = this,
                j = {
                    offsetX: 0,
                    offsetY: 0,
                    baseElWidth: 0,
                    relativePos: 0,
                    position: null,
                    minSwipe: null,
                    maxSwipe: null,
                    sliding: null,
                    dargging: null,
                    targetElement: null
                };
            i.isCssFinish = !0, i.$elem.on(i.ev_types.start, ".owl-wrapper", f)
        },
        getNewPosition: function() {
            var a = this,
                b = a.closestItem();
            return b > a.maximumItem ? (a.currentItem = a.maximumItem, b = a.maximumItem) : a.newPosX >= 0 && (b = 0, a.currentItem = 0), b
        },
        closestItem: function() {
            var b = this,
                c = b.options.scrollPerPage === !0 ? b.pagesInArray : b.positionsInArray,
                d = b.newPosX,
                e = null;
            return a.each(c, function(f, g) {
                d - b.itemWidth / 20 > c[f + 1] && d - b.itemWidth / 20 < g && "left" === b.moveDirection() ? (e = g, b.currentItem = b.options.scrollPerPage === !0 ? a.inArray(e, b.positionsInArray) : f) : d + b.itemWidth / 20 < g && d + b.itemWidth / 20 > (c[f + 1] || c[f] - b.itemWidth) && "right" === b.moveDirection() && (b.options.scrollPerPage === !0 ? (e = c[f + 1] || c[c.length - 1], b.currentItem = a.inArray(e, b.positionsInArray)) : (e = c[f + 1], b.currentItem = f + 1))
            }), b.currentItem
        },
        moveDirection: function() {
            var a, b = this;
            return b.newRelativeX < 0 ? (a = "right", b.playDirection = "next") : (a = "left", b.playDirection = "prev"), a
        },
        customEvents: function() {
            var a = this;
            a.$elem.on("owl.next", function() {
                a.next()
            }), a.$elem.on("owl.prev", function() {
                a.prev()
            }), a.$elem.on("owl.play", function(b, c) {
                a.options.autoPlay = c, a.play(), a.hoverStatus = "play"
            }), a.$elem.on("owl.stop", function() {
                a.stop(), a.hoverStatus = "stop"
            }), a.$elem.on("owl.goTo", function(b, c) {
                a.goTo(c)
            }), a.$elem.on("owl.jumpTo", function(b, c) {
                a.jumpTo(c)
            })
        },
        stopOnHover: function() {
            var a = this;
            a.options.stopOnHover === !0 && a.browser.isTouch !== !0 && a.options.autoPlay !== !1 && (a.$elem.on("mouseover", function() {
                a.stop()
            }), a.$elem.on("mouseout", function() {
                "stop" !== a.hoverStatus && a.play()
            }))
        },
        lazyLoad: function() {
            var b, c, d, e, f, g = this;
            if (g.options.lazyLoad === !1) return !1;
            for (b = 0; b < g.itemsAmount; b += 1) c = a(g.$owlItems[b]), "loaded" !== c.data("owl-loaded") && (d = c.data("owl-item"), e = c.find(".lazyOwl"), "string" == typeof e.data("src") ? (void 0 === c.data("owl-loaded") && (e.hide(), c.addClass("loading").data("owl-loaded", "checked")), f = g.options.lazyFollow === !0 ? d >= g.currentItem : !0, f && d < g.currentItem + g.options.items && e.length && g.lazyPreload(c, e)) : c.data("owl-loaded", "loaded"))
        },
        lazyPreload: function(a, c) {
            function d() {
                a.data("owl-loaded", "loaded").removeClass("loading"), c.removeAttr("data-src"), "fade" === g.options.lazyEffect ? c.fadeIn(400) : c.show(), "function" == typeof g.options.afterLazyLoad && g.options.afterLazyLoad.apply(this, [g.$elem])
            }

            function e() {
                h += 1, g.completeImg(c.get(0)) || f === !0 ? d() : 100 >= h ? b.setTimeout(e, 100) : d()
            }
            var f, g = this,
                h = 0;
            "DIV" === c.prop("tagName") ? (c.css("background-image", "url(" + c.data("src") + ")"), f = !0) : c[0].src = c.data("src"), e()
        },
        autoHeight: function() {
            function c() {
                var c = a(f.$owlItems[f.currentItem]).height();
                f.wrapperOuter.css("height", c + "px"), f.wrapperOuter.hasClass("autoHeight") || b.setTimeout(function() {
                    f.wrapperOuter.addClass("autoHeight")
                }, 0)
            }

            function d() {
                e += 1, f.completeImg(g.get(0)) ? c() : 100 >= e ? b.setTimeout(d, 100) : f.wrapperOuter.css("height", "")
            }
            var e, f = this,
                g = a(f.$owlItems[f.currentItem]).find("img");
            void 0 !== g.get(0) ? (e = 0, d()) : c()
        },
        completeImg: function(a) {
            var b;
            return a.complete ? (b = typeof a.naturalWidth, "undefined" !== b && 0 === a.naturalWidth ? !1 : !0) : !1
        },
        onVisibleItems: function() {
            var b, c = this;
            for (c.options.addClassActive === !0 && c.$owlItems.removeClass("active"), c.visibleItems = [], b = c.currentItem; b < c.currentItem + c.options.items; b += 1) c.visibleItems.push(b), c.options.addClassActive === !0 && a(c.$owlItems[b]).addClass("active");
            c.owl.visibleItems = c.visibleItems
        },
        transitionTypes: function(a) {
            var b = this;
            b.outClass = "owl-" + a + "-out", b.inClass = "owl-" + a + "-in"
        },
        singleItemTransition: function() {
            function a(a) {
                return {
                    position: "relative",
                    left: a + "px"
                }
            }
            var b = this,
                c = b.outClass,
                d = b.inClass,
                e = b.$owlItems.eq(b.currentItem),
                f = b.$owlItems.eq(b.prevItem),
                g = Math.abs(b.positionsInArray[b.currentItem]) + b.positionsInArray[b.prevItem],
                h = Math.abs(b.positionsInArray[b.currentItem]) + b.itemWidth / 2,
                i = "webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend";
            b.isTransition = !0, b.$owlWrapper.addClass("owl-origin").css({
                "-webkit-transform-origin": h + "px",
                "-moz-perspective-origin": h + "px",
                "perspective-origin": h + "px"
            }), f.css(a(g, 10)).addClass(c).on(i, function() {
                b.endPrev = !0, f.off(i), b.clearTransStyle(f, c)
            }), e.addClass(d).on(i, function() {
                b.endCurrent = !0, e.off(i), b.clearTransStyle(e, d)
            })
        },
        clearTransStyle: function(a, b) {
            var c = this;
            a.css({
                position: "",
                left: ""
            }).removeClass(b), c.endPrev && c.endCurrent && (c.$owlWrapper.removeClass("owl-origin"), c.endPrev = !1, c.endCurrent = !1, c.isTransition = !1)
        },
        owlStatus: function() {
            var a = this;
            a.owl = {
                userOptions: a.userOptions,
                baseElement: a.$elem,
                userItems: a.$userItems,
                owlItems: a.$owlItems,
                currentItem: a.currentItem,
                prevItem: a.prevItem,
                visibleItems: a.visibleItems,
                isTouch: a.browser.isTouch,
                browser: a.browser,
                dragDirection: a.dragDirection
            }
        },
        clearEvents: function() {
            var d = this;
            d.$elem.off(".owl owl mousedown.disableTextSelect"), a(c).off(".owl owl"), a(b).off("resize", d.resizer)
        },
        unWrap: function() {
            var a = this;
            0 !== a.$elem.children().length && (a.$owlWrapper.unwrap(), a.$userItems.unwrap().unwrap(), a.owlControls && a.owlControls.remove()), a.clearEvents(), a.$elem.attr("style", a.$elem.data("owl-originalStyles") || "").attr("class", a.$elem.data("owl-originalClasses"))
        },
        destroy: function() {
            var a = this;
            a.stop(), b.clearInterval(a.checkVisible), a.unWrap(), a.$elem.removeData()
        },
        reinit: function(b) {
            var c = this,
                d = a.extend({}, c.userOptions, b);
            c.unWrap(), c.init(d, c.$elem)
        },
        addItem: function(a, b) {
            var c, d = this;
            return a ? 0 === d.$elem.children().length ? (d.$elem.append(a), d.setVars(), !1) : (d.unWrap(), c = void 0 === b || -1 === b ? -1 : b, c >= d.$userItems.length || -1 === c ? d.$userItems.eq(-1).after(a) : d.$userItems.eq(c).before(a), void d.setVars()) : !1
        },
        removeItem: function(a) {
            var b, c = this;
            return 0 === c.$elem.children().length ? !1 : (b = void 0 === a || -1 === a ? -1 : a, c.unWrap(), c.$userItems.eq(b).remove(), void c.setVars())
        }
    };
    a.fn.owlCarousel = function(b) {
        return this.each(function() {
            if (a(this).data("owl-init") === !0) return !1;
            a(this).data("owl-init", !0);
            var c = Object.create(d);
            c.init(b, this), a.data(this, "owlCarousel", c)
        })
    }, a.fn.owlCarousel.options = {
        items: 5,
        itemsCustom: !1,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 2],
        itemsTabletSmall: !1,
        itemsMobile: [479, 1],
        singleItem: !1,
        itemsScaleUp: !1,
        slideSpeed: 200,
        paginationSpeed: 800,
        rewindSpeed: 1e3,
        autoPlay: !1,
        stopOnHover: !1,
        navigation: !1,
        navigationText: ["prev", "next"],
        rewindNav: !0,
        scrollPerPage: !1,
        pagination: !0,
        paginationNumbers: !1,
        responsive: !0,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: b,
        baseClass: "owl-carousel",
        theme: "owl-theme",
        lazyLoad: !1,
        lazyFollow: !0,
        lazyEffect: "fade",
        autoHeight: !1,
        jsonPath: !1,
        jsonSuccess: !1,
        dragBeforeAnimFinish: !0,
        mouseDrag: !0,
        touchDrag: !0,
        addClassActive: !1,
        transitionStyle: !1,
        beforeUpdate: !1,
        afterUpdate: !1,
        beforeInit: !1,
        afterInit: !1,
        beforeMove: !1,
        afterMove: !1,
        afterAction: !1,
        startDragging: !1,
        afterLazyLoad: !1
    }
}(jQuery, window, document), $(document).ready(function() {
    $(".owl-carousel-1").owlCarousel({
        lazyLoad: !0,
        items: 4,
        navigation: !0,
        navigationText: ["<i class='glyph-icon icon-angle-left'></i>", "<i class='glyph-icon icon-angle-right'></i>"]
    }), $(".owl-carousel-2").owlCarousel({
        lazyLoad: !0,
        itemsCustom: [
            [0, 2],
            [450, 4],
            [600, 7],
            [700, 9],
            [1e3, 10],
            [1200, 12],
            [1400, 13],
            [1600, 15]
        ],
        navigation: !0,
        navigationText: ["<i class='glyph-icon icon-angle-left'></i>", "<i class='glyph-icon icon-angle-right'></i>"]
    }), $(".owl-carousel-3").owlCarousel({
        lazyLoad: !0,
        autoPlay: 3e3,
        items: 2,
        stopOnHover: !0,
        navigation: !0,
        navigationText: ["<i class='glyph-icon icon-angle-left'></i>", "<i class='glyph-icon icon-angle-right'></i>"],
        paginationSpeed: 1e3,
        goToFirstSpeed: 2e3,
        singleItem: !1,
        autoHeight: !0,
        transitionStyle: "goDown"
    }), $(".owl-carousel-4").owlCarousel({
        lazyLoad: !0,
        autoPlay: 3e3,
        items: 2,
        stopOnHover: !0,
        navigation: !1,
        paginationSpeed: 1e3,
        goToFirstSpeed: 2e3,
        singleItem: !1,
        autoHeight: !0,
        pagination: !1,
        transitionStyle: "goDown"
    }), $(".owl-carousel-5").owlCarousel({
        lazyLoad: !0,
        autoPlay: 3e3,
        items: 3,
        stopOnHover: !0,
        navigation: !1,
        paginationSpeed: 1e3,
        goToFirstSpeed: 2e3,
        singleItem: !1,
        autoHeight: !0,
        pagination: !1,
        transitionStyle: "goDown"
    }), $(".next").click(function() {
        owl.trigger("owl.next")
    }), $(".prev").click(function() {
        owl.trigger("owl.prev")
    }), $(".owl-slider-1").owlCarousel({
        lazyLoad: !0,
        autoPlay: 3e3,
        stopOnHover: !0,
        navigation: !0,
        navigationText: ["<i class='glyph-icon icon-angle-left'></i>", "<i class='glyph-icon icon-angle-right'></i>"],
        paginationSpeed: 1e3,
        goToFirstSpeed: 2e3,
        singleItem: !0,
        autoHeight: !0,
        transitionStyle: "goDown"
    }), $(".owl-slider-2").owlCarousel({
        lazyLoad: !0,
        autoPlay: 3e3,
        stopOnHover: !0,
        navigation: !0,
        navigationText: ["<i class='glyph-icon icon-angle-left'></i>", "<i class='glyph-icon icon-angle-right'></i>"],
        paginationSpeed: 1e3,
        goToFirstSpeed: 2e3,
        singleItem: !0,
        autoHeight: !0,
        transitionStyle: "fade"
    }), $(".owl-slider-3").owlCarousel({
        lazyLoad: !0,
        autoPlay: 3e3,
        stopOnHover: !0,
        navigation: !1,
        navigationText: ["<i class='glyph-icon icon-angle-left'></i>", "<i class='glyph-icon icon-angle-right'></i>"],
        paginationSpeed: 1e3,
        goToFirstSpeed: 2e3,
        singleItem: !0,
        autoHeight: !1
    }), $(".owl-slider-4").owlCarousel({
        lazyLoad: !0,
        autoPlay: 3e3,
        stopOnHover: !0,
        navigation: !0,
        navigationText: ["<i class='glyph-icon icon-angle-left'></i>", "<i class='glyph-icon icon-angle-right'></i>"],
        paginationSpeed: 1e3,
        goToFirstSpeed: 2e3,
        singleItem: !0,
        autoHeight: !1
    }), $(".owl-slider-5").owlCarousel({
        lazyLoad: !0,
        autoPlay: 3e3,
        stopOnHover: !0,
        navigation: !1,
        paginationSpeed: 1e3,
        goToFirstSpeed: 2e3,
        singleItem: !0,
        autoHeight: !0,
        transitionStyle: "goDown"
    })
}),
function(a, b, c) {
    "use strict";
    var d = a(b),
        e = b.document,
        f = a(e),
        g = function() {
            for (var a, b = 3, c = e.createElement("div"), d = c.getElementsByTagName("i"); c.innerHTML = "<!--[if gt IE " + ++b + "]><i></i><![endif]-->", d[0];);
            return b > 4 ? b : a
        }(),
        h = function() {
            var a = b.pageXOffset !== c ? b.pageXOffset : "CSS1Compat" == e.compatMode ? b.document.documentElement.scrollLeft : b.document.body.scrollLeft,
                d = b.pageYOffset !== c ? b.pageYOffset : "CSS1Compat" == e.compatMode ? b.document.documentElement.scrollTop : b.document.body.scrollTop;
            "undefined" == typeof h.x && (h.x = a, h.y = d), "undefined" == typeof h.distanceX ? (h.distanceX = a, h.distanceY = d) : (h.distanceX = a - h.x, h.distanceY = d - h.y);
            var f = h.x - a,
                g = h.y - d;
            h.direction = 0 > f ? "right" : f > 0 ? "left" : 0 >= g ? "down" : g > 0 ? "up" : "first", h.x = a, h.y = d
        };
    d.on("scroll", h), a.fn.style = function(c) {
        if (!c) return null;
        var d, f = a(this),
            g = f.clone().css("display", "none");
        g.find("input:radio").attr("name", "copy-" + Math.floor(100 * Math.random() + 1)), f.after(g);
        var h = function(a, c) {
            var d;
            return a.currentStyle ? d = a.currentStyle[c.replace(/-\w/g, function(a) {
                return a.toUpperCase().replace("-", "")
            })] : b.getComputedStyle && (d = e.defaultView.getComputedStyle(a, null).getPropertyValue(c)), d = /margin/g.test(c) ? parseInt(d) === f[0].offsetLeft ? d : "auto" : d
        };
        return "string" == typeof c ? d = h(g[0], c) : (d = {}, a.each(c, function(a, b) {
            d[b] = h(g[0], b)
        })), g.remove(), d || null
    }, a.fn.extend({
        hcSticky: function(e) {
            return 0 == this.length ? this : (this.pluginOptions("hcSticky", {
                top: 0,
                bottom: 0,
                bottomEnd: 0,
                innerTop: 0,
                innerSticker: null,
                className: "sticky",
                wrapperClassName: "wrapper-sticky",
                stickTo: null,
                responsive: !0,
                followScroll: !0,
                offResolutions: null,
                onStart: a.noop,
                onStop: a.noop,
                on: !0,
                fn: null
            }, e || {}, {
                reinit: function() {
                    a(this).hcSticky()
                },
                stop: function() {
                    a(this).pluginOptions("hcSticky", {
                        on: !1
                    }).each(function() {
                        var b = a(this),
                            c = b.pluginOptions("hcSticky"),
                            d = b.parent("." + c.wrapperClassName),
                            e = b.offset().top - d.offset().top;
                        b.css({
                            position: "absolute",
                            top: e,
                            bottom: "auto",
                            left: "auto",
                            right: "auto"
                        }).removeClass(c.className)
                    })
                },
                off: function() {
                    a(this).pluginOptions("hcSticky", {
                        on: !1
                    }).each(function() {
                        var b = a(this),
                            c = b.pluginOptions("hcSticky"),
                            d = b.parent("." + c.wrapperClassName);
                        b.css({
                            position: "relative",
                            top: "auto",
                            bottom: "auto",
                            left: "auto",
                            right: "auto"
                        }).removeClass(c.className), d.css("height", "auto")
                    })
                },
                on: function() {
                    a(this).each(function() {
                        a(this).pluginOptions("hcSticky", {
                            on: !0,
                            remember: {
                                offsetTop: d.scrollTop()
                            }
                        }).hcSticky()
                    })
                },
                destroy: function() {
                    var b = a(this),
                        c = b.pluginOptions("hcSticky"),
                        e = b.parent("." + c.wrapperClassName);
                    b.removeData("hcStickyInit").css({
                        position: e.css("position"),
                        top: e.css("top"),
                        bottom: e.css("bottom"),
                        left: e.css("left"),
                        right: e.css("right")
                    }).removeClass(c.className), d.off("resize", c.fn.resize).off("scroll", c.fn.scroll), b.unwrap()
                }
            }), e && "undefined" != typeof e.on && this.hcSticky(e.on ? "on" : "off"), "string" == typeof e ? this : this.each(function() {
                var e = a(this),
                    i = e.pluginOptions("hcSticky"),
                    j = function() {
                        var a = e.parent("." + i.wrapperClassName);
                        return a.length > 0 ? (a.css({
                            height: e.outerHeight(!0),
                            width: function() {
                                var b = a.style("width");
                                return b.indexOf("%") >= 0 || "auto" == b ? ("border-box" == e.css("box-sizing") || "border-box" == e.css("-moz-box-sizing") ? e.css("width", a.width()) : e.css("width", a.width() - parseInt(e.css("padding-left") - parseInt(e.css("padding-right")))), b) : e.outerWidth(!0)
                            }()
                        }), a) : !1
                    }() || function() {
                        var b = e.style(["width", "margin-left", "left", "right", "top", "bottom", "float", "display"]),
                            c = e.css("display"),
                            d = a("<div>", {
                                "class": i.wrapperClassName
                            }).css({
                                display: c,
                                height: e.outerHeight(!0),
                                width: function() {
                                    return b.width.indexOf("%") >= 0 || "auto" == b.width && "inline-block" != c && "inline" != c ? (e.css("width", parseFloat(e.css("width"))), b.width) : "auto" != b.width || "inline-block" != c && "inline" != c ? "auto" == b["margin-left"] ? e.outerWidth() : e.outerWidth(!0) : e.width()
                                }(),
                                margin: b["margin-left"] ? "auto" : null,
                                position: function() {
                                    var a = e.css("position");
                                    return "static" == a ? "relative" : a
                                }(),
                                "float": b["float"] || null,
                                left: b.left,
                                right: b.right,
                                top: b.top,
                                bottom: b.bottom,
                                "vertical-align": "top"
                            });
                        return e.wrap(d), 7 === g && 0 === a("head").find("style#hcsticky-iefix").length && a('<style id="hcsticky-iefix">.' + i.wrapperClassName + " {zoom: 1;}</style>").appendTo("head"), e.parent()
                    }();
                if (!e.data("hcStickyInit")) {
                    e.data("hcStickyInit", !0);
                    var k = i.stickTo && ("document" == i.stickTo || i.stickTo.nodeType && 9 == i.stickTo.nodeType || "object" == typeof i.stickTo && i.stickTo instanceof("undefined" != typeof HTMLDocument ? HTMLDocument : Document)) ? !0 : !1,
                        l = i.stickTo ? k ? f : "string" == typeof i.stickTo ? a(i.stickTo) : i.stickTo : j.parent();
                    e.css({
                        top: "auto",
                        bottom: "auto",
                        left: "auto",
                        right: "auto"
                    }), d.load(function() {
                        e.outerHeight(!0) > l.height() && (j.css("height", e.outerHeight(!0)), e.hcSticky("reinit"))
                    });
                    var m = function(a) {
                        e.hasClass(i.className) || (a = a || {}, e.css({
                            position: "fixed",
                            top: a.top || 0,
                            left: a.left || j.offset().left
                        }).addClass(i.className), i.onStart.apply(e[0]), j.addClass("sticky-active"))
                    }, n = function(a) {
                            a = a || {}, a.position = a.position || "absolute", a.top = a.top || 0, a.left = a.left || 0, ("fixed" == e.css("position") || parseInt(e.css("top")) != a.top) && (e.css({
                                position: a.position,
                                top: a.top,
                                left: a.left
                            }).removeClass(i.className), i.onStop.apply(e[0]), j.removeClass("sticky-active"))
                        }, o = function() {
                            if (i.on && !(e.outerHeight(!0) >= l.height())) {
                                var b, c = i.innerSticker ? a(i.innerSticker).position().top : i.innerTop ? i.innerTop : 0,
                                    f = j.offset().top,
                                    g = l.height() - i.bottomEnd + (k ? 0 : f),
                                    o = j.offset().top - i.top + c,
                                    p = e.outerHeight(!0) + i.bottom,
                                    q = d.height(),
                                    r = d.scrollTop(),
                                    s = e.offset().top,
                                    t = s - r;
                                if ("undefined" != typeof i.remember && i.remember) {
                                    var u = s - i.top - c;
                                    return void(p - c > q && i.followScroll ? r > u && r + q <= u + e.height() && (i.remember = !1) : i.remember.offsetTop > u ? u >= r && (m({
                                        top: i.top - c
                                    }), i.remember = !1) : r >= u && (m({
                                        top: i.top - c
                                    }), i.remember = !1))
                                }
                                r > o ? g + i.bottom - (i.followScroll && p > q ? 0 : i.top) <= r + p - c - (p - c > q - (o - c) && i.followScroll && (b = p - q - c) > 0 ? b : 0) ? n({
                                    top: g - p + i.bottom - f
                                }) : p - c > q && i.followScroll ? q >= t + p ? "down" == h.direction ? m({
                                    top: q - p
                                }) : 0 > t && "fixed" == e.css("position") && n({
                                    top: s - (o + i.top - c) - h.distanceY
                                }) : "up" == h.direction && s >= r + i.top - c ? m({
                                    top: i.top - c
                                }) : "down" == h.direction && s + p > q && "fixed" == e.css("position") && n({
                                    top: s - (o + i.top - c) - h.distanceY
                                }) : m({
                                    top: i.top - c
                                }) : n()
                            }
                        }, p = !1,
                        q = !1,
                        r = function() {
                            if (t(), s(), i.on) {
                                var a = function() {
                                    "fixed" == e.css("position") ? e.css("left", j.offset().left) : e.css("left", 0)
                                };
                                if (i.responsive) {
                                    q || (q = e.clone().attr("style", "").css({
                                        visibility: "hidden",
                                        height: 0,
                                        overflow: "hidden",
                                        paddingTop: 0,
                                        paddingBottom: 0,
                                        marginTop: 0,
                                        marginBottom: 0
                                    }), j.after(q));
                                    var b = j.style("width"),
                                        c = q.style("width");
                                    "auto" == c && "auto" != b && (c = parseInt(e.css("width"))), c != b && j.width(c), p && clearTimeout(p), p = setTimeout(function() {
                                        p = !1, q.remove(), q = !1
                                    }, 250)
                                }
                                if (a(), e.outerWidth(!0) != j.width()) {
                                    var d = "border-box" == e.css("box-sizing") || "border-box" == e.css("-moz-box-sizing") ? j.width() : j.width() - parseInt(e.css("padding-left")) - parseInt(e.css("padding-right"));
                                    d = d - parseInt(e.css("margin-left")) - parseInt(e.css("margin-right")), e.css("width", d)
                                }
                            }
                        };
                    e.pluginOptions("hcSticky", {
                        fn: {
                            scroll: o,
                            resize: r
                        }
                    });
                    var s = function() {
                        if (i.offResolutions) {
                            a.isArray(i.offResolutions) || (i.offResolutions = [i.offResolutions]);
                            var b = !0;
                            a.each(i.offResolutions, function(a, c) {
                                0 > c ? d.width() < -1 * c && (b = !1, e.hcSticky("off")) : d.width() > c && (b = !1, e.hcSticky("off"))
                            }), b && !i.on && e.hcSticky("on")
                        }
                    };
                    s(), d.on("resize", r);
                    var t = function() {
                        if (e.outerHeight(!0) < l.height()) {
                            var f = !1;
                            a._data(b, "events").scroll != c && a.each(a._data(b, "events").scroll, function(a, b) {
                                b.handler == i.fn.scroll && (f = !0)
                            }), f || (i.fn.scroll(!0), d.on("scroll", i.fn.scroll))
                        }
                    };
                    t()
                }
            }))
        }
    })
}(jQuery, this),
function(a, b) {
    "use strict";
    a.fn.extend({
        pluginOptions: function(c, d, e, f) {
            return this.data(c) || this.data(c, {}), c && "undefined" == typeof d ? this.data(c).options : (e = e || d || {}, "object" == typeof e || e === b ? this.each(function() {
                var b = a(this);
                b.data(c).options ? b.data(c, a.extend(b.data(c), {
                    options: a.extend(b.data(c).options, e || {})
                })) : (b.data(c, {
                    options: a.extend(d, e || {})
                }), f && (b.data(c).commands = f))
            }) : "string" == typeof e ? this.each(function() {
                a(this).data(c).commands[e].call(this)
            }) : this)
        }
    })
}(jQuery),
function() {
    var a, b, c, d, e, f = function(a, b) {
            return function() {
                return a.apply(b, arguments)
            }
        }, g = [].indexOf || function(a) {
            for (var b = 0, c = this.length; c > b; b++)
                if (b in this && this[b] === a) return b;
            return -1
        };
    b = function() {
        function a() {}
        return a.prototype.extend = function(a, b) {
            var c, d;
            for (c in b) d = b[c], null == a[c] && (a[c] = d);
            return a
        }, a.prototype.isMobile = function(a) {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(a)
        }, a.prototype.addEvent = function(a, b, c) {
            return null != a.addEventListener ? a.addEventListener(b, c, !1) : null != a.attachEvent ? a.attachEvent("on" + b, c) : a[b] = c
        }, a.prototype.removeEvent = function(a, b, c) {
            return null != a.removeEventListener ? a.removeEventListener(b, c, !1) : null != a.detachEvent ? a.detachEvent("on" + b, c) : delete a[b]
        }, a.prototype.innerHeight = function() {
            return "innerHeight" in window ? window.innerHeight : document.documentElement.clientHeight
        }, a
    }(), c = this.WeakMap || this.MozWeakMap || (c = function() {
        function a() {
            this.keys = [], this.values = []
        }
        return a.prototype.get = function(a) {
            var b, c, d, e, f;
            for (f = this.keys, b = d = 0, e = f.length; e > d; b = ++d)
                if (c = f[b], c === a) return this.values[b]
        }, a.prototype.set = function(a, b) {
            var c, d, e, f, g;
            for (g = this.keys, c = e = 0, f = g.length; f > e; c = ++e)
                if (d = g[c], d === a) return void(this.values[c] = b);
            return this.keys.push(a), this.values.push(b)
        }, a
    }()), a = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (a = function() {
        function a() {
            "undefined" != typeof console && null !== console && console.warn("MutationObserver is not supported by your browser."), "undefined" != typeof console && null !== console && console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.")
        }
        return a.notSupported = !0, a.prototype.observe = function() {}, a
    }()), d = this.getComputedStyle || function(a) {
        return this.getPropertyValue = function(b) {
            var c;
            return "float" === b && (b = "styleFloat"), e.test(b) && b.replace(e, function(a, b) {
                return b.toUpperCase()
            }), (null != (c = a.currentStyle) ? c[b] : void 0) || null
        }, this
    }, e = /(\-([a-z]){1})/g, this.WOW = function() {
        function e(a) {
            null == a && (a = {}), this.scrollCallback = f(this.scrollCallback, this), this.scrollHandler = f(this.scrollHandler, this), this.start = f(this.start, this), this.scrolled = !0, this.config = this.util().extend(a, this.defaults), this.animationNameCache = new c
        }
        return e.prototype.defaults = {
            boxClass: "wow",
            animateClass: "animated",
            offset: 0,
            mobile: !0,
            live: !0
        }, e.prototype.init = function() {
            var a;
            return this.element = window.document.documentElement, "interactive" === (a = document.readyState) || "complete" === a ? this.start() : this.util().addEvent(document, "DOMContentLoaded", this.start), this.finished = []
        }, e.prototype.start = function() {
            var b, c, d, e;
            if (this.stopped = !1, this.boxes = function() {
                var a, c, d, e;
                for (d = this.element.querySelectorAll("." + this.config.boxClass), e = [], a = 0, c = d.length; c > a; a++) b = d[a], e.push(b);
                return e
            }.call(this), this.all = function() {
                var a, c, d, e;
                for (d = this.boxes, e = [], a = 0, c = d.length; c > a; a++) b = d[a], e.push(b);
                return e
            }.call(this), this.boxes.length)
                if (this.disabled()) this.resetStyle();
                else {
                    for (e = this.boxes, c = 0, d = e.length; d > c; c++) b = e[c], this.applyStyle(b, !0);
                    this.util().addEvent(window, "scroll", this.scrollHandler), this.util().addEvent(window, "resize", this.scrollHandler), this.interval = setInterval(this.scrollCallback, 50)
                }
            return this.config.live ? new a(function(a) {
                return function(b) {
                    var c, d, e, f, g;
                    for (g = [], e = 0, f = b.length; f > e; e++) d = b[e], g.push(function() {
                        var a, b, e, f;
                        for (e = d.addedNodes || [], f = [], a = 0, b = e.length; b > a; a++) c = e[a], f.push(this.doSync(c));
                        return f
                    }.call(a));
                    return g
                }
            }(this)).observe(document.body, {
                childList: !0,
                subtree: !0
            }) : void 0
        }, e.prototype.stop = function() {
            return this.stopped = !0, this.util().removeEvent(window, "scroll", this.scrollHandler), this.util().removeEvent(window, "resize", this.scrollHandler), null != this.interval ? clearInterval(this.interval) : void 0
        }, e.prototype.sync = function() {
            return a.notSupported ? this.doSync(this.element) : void 0
        }, e.prototype.doSync = function(a) {
            var b, c, d, e, f;
            if (!this.stopped) {
                if (null == a && (a = this.element), 1 !== a.nodeType) return;
                for (a = a.parentNode || a, e = a.querySelectorAll("." + this.config.boxClass), f = [], c = 0, d = e.length; d > c; c++) b = e[c], g.call(this.all, b) < 0 ? (this.applyStyle(b, !0), this.boxes.push(b), this.all.push(b), f.push(this.scrolled = !0)) : f.push(void 0);
                return f
            }
        }, e.prototype.show = function(a) {
            return this.applyStyle(a), a.className = "" + a.className + " " + this.config.animateClass
        }, e.prototype.applyStyle = function(a, b) {
            var c, d, e;
            return d = a.getAttribute("data-wow-duration"), c = a.getAttribute("data-wow-delay"), e = a.getAttribute("data-wow-iteration"), this.animate(function(f) {
                return function() {
                    return f.customStyle(a, b, d, c, e)
                }
            }(this))
        }, e.prototype.animate = function() {
            return "requestAnimationFrame" in window ? function(a) {
                return window.requestAnimationFrame(a)
            } : function(a) {
                return a()
            }
        }(), e.prototype.resetStyle = function() {
            var a, b, c, d, e;
            for (d = this.boxes, e = [], b = 0, c = d.length; c > b; b++) a = d[b], e.push(a.setAttribute("style", "visibility: visible;"));
            return e
        }, e.prototype.customStyle = function(a, b, c, d, e) {
            return b && this.cacheAnimationName(a), a.style.visibility = b ? "hidden" : "visible", c && this.vendorSet(a.style, {
                animationDuration: c
            }), d && this.vendorSet(a.style, {
                animationDelay: d
            }), e && this.vendorSet(a.style, {
                animationIterationCount: e
            }), this.vendorSet(a.style, {
                animationName: b ? "none" : this.cachedAnimationName(a)
            }), a
        }, e.prototype.vendors = ["moz", "webkit"], e.prototype.vendorSet = function(a, b) {
            var c, d, e, f;
            f = [];
            for (c in b) d = b[c], a["" + c] = d, f.push(function() {
                var b, f, g, h;
                for (g = this.vendors, h = [], b = 0, f = g.length; f > b; b++) e = g[b], h.push(a["" + e + c.charAt(0).toUpperCase() + c.substr(1)] = d);
                return h
            }.call(this));
            return f
        }, e.prototype.vendorCSS = function(a, b) {
            var c, e, f, g, h, i;
            for (e = d(a), c = e.getPropertyCSSValue(b), i = this.vendors, g = 0, h = i.length; h > g; g++) f = i[g], c = c || e.getPropertyCSSValue("-" + f + "-" + b);
            return c
        }, e.prototype.animationName = function(a) {
            var b;
            try {
                b = this.vendorCSS(a, "animation-name").cssText
            } catch (c) {
                b = d(a).getPropertyValue("animation-name")
            }
            return "none" === b ? "" : b
        }, e.prototype.cacheAnimationName = function(a) {
            return this.animationNameCache.set(a, this.animationName(a))
        }, e.prototype.cachedAnimationName = function(a) {
            return this.animationNameCache.get(a)
        }, e.prototype.scrollHandler = function() {
            return this.scrolled = !0
        }, e.prototype.scrollCallback = function() {
            var a;
            return !this.scrolled || (this.scrolled = !1, this.boxes = function() {
                var b, c, d, e;
                for (d = this.boxes, e = [], b = 0, c = d.length; c > b; b++) a = d[b], a && (this.isVisible(a) ? this.show(a) : e.push(a));
                return e
            }.call(this), this.boxes.length || this.config.live) ? void 0 : this.stop()
        }, e.prototype.offsetTop = function(a) {
            for (var b; void 0 === a.offsetTop;) a = a.parentNode;
            for (b = a.offsetTop; a = a.offsetParent;) b += a.offsetTop;
            return b
        }, e.prototype.isVisible = function(a) {
            var b, c, d, e, f;
            return c = a.getAttribute("data-wow-offset") || this.config.offset, f = window.pageYOffset, e = f + Math.min(this.element.clientHeight, this.util().innerHeight()) - c, d = this.offsetTop(a), b = d + a.clientHeight, e >= d && b >= f
        }, e.prototype.util = function() {
            return null != this._util ? this._util : this._util = new b
        }, e.prototype.disabled = function() {
            return !this.config.mobile && this.util().isMobile(navigator.userAgent)
        }, e
    }()
}.call(this),
function(a) {
    a.fn.videoBG = function(b, c) {
        var c = {};
        if ("object" == typeof b) c = a.extend({}, a.fn.videoBG.defaults, b);
        else {
            if (b) return a(b).videoBG(c);
            c = a.fn.videoBG.defaults
        }
        var d = a(this);
        if (d.length) {
            "static" != d.css("position") && d.css("position") || d.css("position", "relative"), 0 == c.width && (c.width = d.width()), 0 == c.height && (c.height = d.height());
            var e = a.fn.videoBG.wrapper();
            e.height(c.height).width(c.width), c.textReplacement ? (c.scale = !0, d.width(c.width).height(c.height).css("text-indent", "-9999px")) : e.css("z-index", c.zIndex + 1), e.html(d.clone(!0));
            var f = a.fn.videoBG.video(c);
            return c.scale && (e.height(c.height).width(c.width), f.height(c.height).width(c.width)), d.html(e), d.append(f), f.find("video")[0]
        }
    }, a.fn.videoBG.setFullscreen = function(b) {
        var c = a(window).width(),
            d = a(window).height();
        if (b.css("min-height", 0).css("min-width", 0), b.parent().width(c).height(d), c / d > b.aspectRatio) {
            b.width(c).height("auto");
            var e = b.height(),
                f = (e - d) / 2;
            0 > f && (f = 0), b.css("top", -f)
        } else {
            b.width("auto").height(d);
            var g = b.width(),
                f = (g - c) / 2;
            if (0 > f && (f = 0), b.css("left", -f), 0 === f) {
                setTimeout(function() {
                    a.fn.videoBG.setFullscreen(b)
                }, 500)
            }
        }
        a("body > .videoBG_wrapper").width(c).height(d)
    }, a.fn.videoBG.video = function(b) {
        a("html, body").scrollTop(-1);
        var c = a("<div/>");
        c.addClass("videoBG").css("position", b.position).css("z-index", b.zIndex).css("top", 0).css("left", 0).css("height", b.height).css("width", b.width).css("opacity", b.opacity).css("overflow", "hidden");
        var d = a("<video/>");
        if (d.css("position", "absolute").css("z-index", b.zIndex).attr("poster", b.poster).css("top", 0).css("left", 0).css("min-width", "100%").css("min-height", "100%"), b.autoplay && d.attr("autoplay", b.autoplay), b.fullscreen) {
            d.bind("canplay", function() {
                d.aspectRatio = d.width() / d.height(), a.fn.videoBG.setFullscreen(d)
            });
            var e;
            a(window).resize(function() {
                clearTimeout(e), e = setTimeout(function() {
                    a.fn.videoBG.setFullscreen(d)
                }, 100)
            }), a.fn.videoBG.setFullscreen(d)
        }
        var f = d[0];
        b.loop && (loops_left = b.loop, d.bind("ended", function() {
            loops_left && f.play(), loops_left !== !0 && loops_left--
        })), d.bind("canplay", function() {
            b.autoplay && f.play()
        }), a.fn.videoBG.supportsVideo() && (a.fn.videoBG.supportType("webm") ? d.attr("src", b.webm) : a.fn.videoBG.supportType("mp4") ? d.attr("src", b.mp4) : d.attr("src", b.ogv));
        var g = a("<img/>");
        return g.attr("src", b.poster).css("position", "absolute").css("z-index", b.zIndex).css("top", 0).css("left", 0).css("min-width", "100%").css("min-height", "100%"), c.html(a.fn.videoBG.supportsVideo() ? d : g), b.textReplacement && (c.css("min-height", 1).css("min-width", 1), d.css("min-height", 1).css("min-width", 1), g.css("min-height", 1).css("min-width", 1), c.height(b.height).width(b.width), d.height(b.height).width(b.width), g.height(b.height).width(b.width)), a.fn.videoBG.supportsVideo() && f.play(), c
    }, a.fn.videoBG.supportsVideo = function() {
        return document.createElement("video").canPlayType
    }, a.fn.videoBG.supportType = function(b) {
        if (!a.fn.videoBG.supportsVideo()) return !1;
        var c = document.createElement("video");
        switch (b) {
            case "webm":
                return c.canPlayType('video/webm; codecs="vp8, vorbis"');
            case "mp4":
                return c.canPlayType('video/mp4; codecs="avc1.42E01E, mp4a.40.2"');
            case "ogv":
                return c.canPlayType('video/ogg; codecs="theora, vorbis"')
        }
        return !1
    }, a.fn.videoBG.wrapper = function() {
        var b = a("<div/>");
        return b.addClass("videoBG_wrapper").css("position", "absolute").css("top", 0).css("left", 0), b
    }, a.fn.videoBG.defaults = {
        mp4: "",
        ogv: "",
        webm: "",
        poster: "",
        autoplay: !0,
        loop: !0,
        scale: !1,
        position: "absolute",
        opacity: .7,
        textReplacement: !1,
        zIndex: 0,
        width: 0,
        height: 0,
        fullscreen: !1,
        imgFallback: !0
    }
}(jQuery), $(function() {
    "use strict";
    $(".video-example-1").videoBG({
        mp4: "../assets/image-resources/video/tablet.mp4",
        ogv: "../assets/image-resources/video/tablet.ogv",
        webm: "../assets/image-resources/video/tablet.webm",
        scale: !0,
        opacity: 1,
        position: "relative",
        height: "100%",
        width: "100%",
        zIndex: 0
    })
}), $(function() {
    "use strict";
    $(".video-example-2").videoBG({
        mp4: "../assets/image-resources/video/cars.mp4",
        ogv: "../assets/image-resources/video/cars.ogv",
        webm: "../assets/image-resources/video/cars.webm",
        scale: !0,
        opacity: 1,
        position: "relative",
        height: "100%",
        width: "100%",
        zIndex: 0
    })
}), $(function() {
    "use strict";
    $(".video-example-3").videoBG({
        mp4: "../assets/image-resources/video/sun.mp4",
        ogv: "../assets/image-resources/video/sun.ogv",
        webm: "../assets/image-resources/video/sun.webm",
        scale: !0,
        opacity: 1,
        position: "relative",
        height: "100%",
        width: "100%",
        zIndex: 0
    })
}), $(function() {
    "use strict";
    $("video,audio").each(function() {
        this.muted = !0
    })
}),
function(a) {
    function b(b, d, g, h, i) {
        function j() {
            p.unbind("webkitTransitionEnd transitionend otransitionend oTransitionEnd"), d && c(d, g, h, i), i.startOrder = [], i.newOrder = [], i.origSort = [], i.checkSort = [], o.removeStyle(i.prefix + "filter, filter, " + i.prefix + "transform, transform, opacity, display").css(i.clean).removeAttr("data-checksum"), window.atob || o.css({
                display: "none",
                opacity: "0"
            }), p.removeStyle(i.prefix + "transition, transition, " + i.prefix + "perspective, perspective, " + i.prefix + "perspective-origin, perspective-origin, " + (i.resizeContainer ? "height" : "")), "list" == i.layoutMode ? (q.css({
                display: i.targetDisplayList,
                opacity: "1"
            }), i.origDisplay = i.targetDisplayList) : (q.css({
                display: i.targetDisplayGrid,
                opacity: "1"
            }), i.origDisplay = i.targetDisplayGrid), i.origLayout = i.layoutMode, setTimeout(function() {
                if (o.removeStyle(i.prefix + "transition, transition"), i.mixing = !1, "function" == typeof i.onMixEnd) {
                    var a = i.onMixEnd.call(this, i);
                    i = a ? a : i
                }
            })
        }
        if (clearInterval(i.failsafe), i.mixing = !0, i.filter = b, "function" == typeof i.onMixStart) {
            var k = i.onMixStart.call(this, i);
            i = k ? k : i
        }
        for (var l = i.transitionSpeed, k = 0; 2 > k; k++) {
            var m = 0 == k ? m = i.prefix : "";
            i.transition[m + "transition"] = "all " + l + "ms linear", i.transition[m + "transform"] = m + "translate3d(0,0,0)", i.perspective[m + "perspective"] = i.perspectiveDistance + "px", i.perspective[m + "perspective-origin"] = i.perspectiveOrigin
        }
        var n = i.targetSelector,
            o = h.find(n);
        o.each(function() {
            this.data = {}
        });
        var p = o.parent();
        p.css(i.perspective), i.easingFallback = "ease-in-out", "smooth" == i.easing && (i.easing = "cubic-bezier(0.25, 0.46, 0.45, 0.94)"), "snap" == i.easing && (i.easing = "cubic-bezier(0.77, 0, 0.175, 1)"), "windback" == i.easing && (i.easing = "cubic-bezier(0.175, 0.885, 0.320, 1.275)", i.easingFallback = "cubic-bezier(0.175, 0.885, 0.320, 1)"), "windup" == i.easing && (i.easing = "cubic-bezier(0.6, -0.28, 0.735, 0.045)", i.easingFallback = "cubic-bezier(0.6, 0.28, 0.735, 0.045)"), k = "list" == i.layoutMode && null != i.listEffects ? i.listEffects : i.effects, Array.prototype.indexOf && (i.fade = -1 < k.indexOf("fade") ? "0" : "", i.scale = -1 < k.indexOf("scale") ? "scale(.01)" : "", i.rotateZ = -1 < k.indexOf("rotateZ") ? "rotate(180deg)" : "", i.rotateY = -1 < k.indexOf("rotateY") ? "rotateY(90deg)" : "", i.rotateX = -1 < k.indexOf("rotateX") ? "rotateX(90deg)" : "", i.blur = -1 < k.indexOf("blur") ? "blur(8px)" : "", i.grayscale = -1 < k.indexOf("grayscale") ? "grayscale(100%)" : "");
        var q = a(),
            r = a(),
            s = [],
            t = !1;
        "string" == typeof b ? s = f(b) : (t = !0, a.each(b, function(a) {
            s[a] = f(this)
        })), "or" == i.filterLogic ? ("" == s[0] && s.shift(), 1 > s.length ? r = r.add(h.find(n + ":visible")) : o.each(function() {
            var b = a(this);
            if (t) {
                var c = 0;
                a.each(s, function() {
                    this.length ? b.is("." + this.join(", .")) && c++ : c > 0 && c++
                }), c == s.length ? q = q.add(b) : r = r.add(b)
            } else b.is("." + s.join(", .")) ? q = q.add(b) : r = r.add(b)
        })) : (q = q.add(p.find(n + "." + s.join("."))), r = r.add(p.find(n + ":not(." + s.join(".") + "):visible"))), b = q.length;
        var u = a(),
            v = a(),
            w = a();
        if (r.each(function() {
            var b = a(this);
            "none" != b.css("display") && (u = u.add(b), w = w.add(b))
        }), q.filter(":visible").length == b && !u.length && !d) {
            if (i.origLayout == i.layoutMode) return j(), !1;
            if (1 == q.length) return "list" == i.layoutMode ? (h.addClass(i.listClass), h.removeClass(i.gridClass), w.css("display", i.targetDisplayList)) : (h.addClass(i.gridClass), h.removeClass(i.listClass), w.css("display", i.targetDisplayGrid)), j(), !1
        }
        if (i.origHeight = p.height(), q.length) {
            if (h.removeClass(i.failClass), q.each(function() {
                var b = a(this);
                "none" == b.css("display") ? v = v.add(b) : w = w.add(b)
            }), i.origLayout != i.layoutMode && 0 == i.animateGridList) return "list" == i.layoutMode ? (h.addClass(i.listClass), h.removeClass(i.gridClass), w.css("display", i.targetDisplayList)) : (h.addClass(i.gridClass), h.removeClass(i.listClass), w.css("display", i.targetDisplayGrid)), j(), !1;
            if (!window.atob) return j(), !1;
            if (o.css(i.clean), w.each(function() {
                this.data.origPos = a(this).offset()
            }), "list" == i.layoutMode ? (h.addClass(i.listClass), h.removeClass(i.gridClass), v.css("display", i.targetDisplayList)) : (h.addClass(i.gridClass), h.removeClass(i.listClass), v.css("display", i.targetDisplayGrid)), v.each(function() {
                this.data.showInterPos = a(this).offset()
            }), u.each(function() {
                this.data.hideInterPos = a(this).offset()
            }), w.each(function() {
                this.data.preInterPos = a(this).offset()
            }), "list" == i.layoutMode ? w.css("display", i.targetDisplayList) : w.css("display", i.targetDisplayGrid), d && c(d, g, h, i), d && e(i.origSort, i.checkSort)) return j(), !1;
            for (u.hide(), v.each(function() {
                this.data.finalPos = a(this).offset()
            }), w.each(function() {
                this.data.finalPrePos = a(this).offset()
            }), i.newHeight = p.height(), d && c("reset", null, h, i), v.hide(), w.css("display", i.origDisplay), "block" == i.origDisplay ? (h.addClass(i.listClass), v.css("display", i.targetDisplayList)) : (h.removeClass(i.listClass), v.css("display", i.targetDisplayGrid)), i.resizeContainer && p.css("height", i.origHeight + "px"), b = {}, k = 0; 2 > k; k++) m = 0 == k ? m = i.prefix : "", b[m + "transform"] = i.scale + " " + i.rotateX + " " + i.rotateY + " " + i.rotateZ, b[m + "filter"] = i.blur + " " + i.grayscale;
            v.css(b), w.each(function() {
                var b = this.data,
                    c = a(this);
                c.hasClass("mix_tohide") ? (b.preTX = b.origPos.left - b.hideInterPos.left, b.preTY = b.origPos.top - b.hideInterPos.top) : (b.preTX = b.origPos.left - b.preInterPos.left, b.preTY = b.origPos.top - b.preInterPos.top);
                for (var d = {}, e = 0; 2 > e; e++) {
                    var f = 0 == e ? f = i.prefix : "";
                    d[f + "transform"] = "translate(" + b.preTX + "px," + b.preTY + "px)"
                }
                c.css(d)
            }), "list" == i.layoutMode ? (h.addClass(i.listClass), h.removeClass(i.gridClass)) : (h.addClass(i.gridClass), h.removeClass(i.listClass)), setTimeout(function() {
                if (i.resizeContainer) {
                    for (var b = {}, c = 0; 2 > c; c++) {
                        var d = 0 == c ? d = i.prefix : "";
                        b[d + "transition"] = "all " + l + "ms ease-in-out", b.height = i.newHeight + "px"
                    }
                    p.css(b)
                }
                for (u.css("opacity", i.fade), v.css("opacity", 1), v.each(function() {
                    var b = this.data;
                    b.tX = b.finalPos.left - b.showInterPos.left, b.tY = b.finalPos.top - b.showInterPos.top;
                    for (var c = {}, d = 0; 2 > d; d++) {
                        var e = 0 == d ? e = i.prefix : "";
                        c[e + "transition-property"] = e + "transform, " + e + "filter, opacity", c[e + "transition-timing-function"] = i.easing + ", linear, linear", c[e + "transition-duration"] = l + "ms", c[e + "transition-delay"] = "0", c[e + "transform"] = "translate(" + b.tX + "px," + b.tY + "px)", c[e + "filter"] = "none"
                    }
                    a(this).css("-webkit-transition", "all " + l + "ms " + i.easingFallback).css(c)
                }), w.each(function() {
                    var b = this.data;
                    b.tX = 0 != b.finalPrePos.left ? b.finalPrePos.left - b.preInterPos.left : 0, b.tY = 0 != b.finalPrePos.left ? b.finalPrePos.top - b.preInterPos.top : 0;
                    for (var c = {}, d = 0; 2 > d; d++) {
                        var e = 0 == d ? e = i.prefix : "";
                        c[e + "transition"] = "all " + l + "ms " + i.easing, c[e + "transform"] = "translate(" + b.tX + "px," + b.tY + "px)"
                    }
                    a(this).css("-webkit-transition", "all " + l + "ms " + i.easingFallback).css(c)
                }), b = {}, c = 0; 2 > c; c++) d = 0 == c ? d = i.prefix : "", b[d + "transition"] = "all " + l + "ms " + i.easing + ", " + d + "filter " + l + "ms linear, opacity " + l + "ms linear", b[d + "transform"] = i.scale + " " + i.rotateX + " " + i.rotateY + " " + i.rotateZ, b[d + "filter"] = i.blur + " " + i.grayscale, b.opacity = i.fade;
                u.css(b), p.bind("webkitTransitionEnd transitionend otransitionend oTransitionEnd", function(b) {
                    (-1 < b.originalEvent.propertyName.indexOf("transform") || -1 < b.originalEvent.propertyName.indexOf("opacity")) && (-1 < n.indexOf(".") ? a(b.target).hasClass(n.replace(".", "")) && j() : a(b.target).is(n) && j())
                })
            }, 10), i.failsafe = setTimeout(function() {
                i.mixing && j()
            }, l + 400)
        } else {
            if (i.resizeContainer && p.css("height", i.origHeight + "px"), !window.atob) return j(), !1;
            u = r, setTimeout(function() {
                if (p.css(i.perspective), i.resizeContainer) {
                    for (var a = {}, b = 0; 2 > b; b++) {
                        var c = 0 == b ? c = i.prefix : "";
                        a[c + "transition"] = "height " + l + "ms ease-in-out", a.height = i.minHeight + "px"
                    }
                    p.css(a)
                }
                if (o.css(i.transition), r.length) {
                    for (a = {}, b = 0; 2 > b; b++) c = 0 == b ? c = i.prefix : "", a[c + "transform"] = i.scale + " " + i.rotateX + " " + i.rotateY + " " + i.rotateZ, a[c + "filter"] = i.blur + " " + i.grayscale, a.opacity = i.fade;
                    u.css(a), p.bind("webkitTransitionEnd transitionend otransitionend oTransitionEnd", function(a) {
                        (-1 < a.originalEvent.propertyName.indexOf("transform") || -1 < a.originalEvent.propertyName.indexOf("opacity")) && (h.addClass(i.failClass), j())
                    })
                } else i.mixing = !1
            }, 10)
        }
    }

    function c(b, c, d, e) {
        function f(a, c) {
            var d = isNaN(1 * a.attr(b)) ? a.attr(b).toLowerCase() : 1 * a.attr(b),
                e = isNaN(1 * c.attr(b)) ? c.attr(b).toLowerCase() : 1 * c.attr(b);
            return e > d ? -1 : d > e ? 1 : 0
        }

        function g(a) {
            "asc" == c ? i.prepend(a).prepend(" ") : i.append(a).append(" ")
        }

        function h(a) {
            a = a.slice();
            for (var b = a.length, c = b; c--;) {
                var d = parseInt(Math.random() * b),
                    e = a[c];
                a[c] = a[d], a[d] = e
            }
            return a
        }
        d.find(e.targetSelector).wrapAll('<div class="mix_sorter"/>');
        var i = d.find(".mix_sorter");
        if (e.origSort.length || i.find(e.targetSelector + ":visible").each(function() {
            a(this).wrap("<s/>"), e.origSort.push(a(this).parent().html().replace(/\s+/g, "")), a(this).unwrap()
        }), i.empty(), "reset" == b) a.each(e.startOrder, function() {
            i.append(this).append(" ")
        });
        else if ("default" == b) a.each(e.origOrder, function() {
            g(this)
        });
        else if ("random" == b) e.newOrder.length || (e.newOrder = h(e.startOrder)), a.each(e.newOrder, function() {
            i.append(this).append(" ")
        });
        else if ("custom" == b) a.each(c, function() {
            g(this)
        });
        else {
            if ("undefined" == typeof e.origOrder[0].attr(b)) return console.log("No such attribute found. Terminating"), !1;
            e.newOrder.length || (a.each(e.origOrder, function() {
                e.newOrder.push(a(this))
            }), e.newOrder.sort(f)), a.each(e.newOrder, function() {
                g(this)
            })
        }
        e.checkSort = [], i.find(e.targetSelector + ":visible").each(function(b) {
            var c = a(this);
            0 == b && c.attr("data-checksum", "1"), c.wrap("<s/>"), e.checkSort.push(c.parent().html().replace(/\s+/g, "")), c.unwrap()
        }), d.find(e.targetSelector).unwrap()
    }

    function d(a) {
        for (var b = ["Webkit", "Moz", "O", "ms"], c = 0; c < b.length; c++)
            if (b[c] + "Transition" in a.style) return b[c];
        return "transition" in a.style ? "" : !1
    }

    function e(a, b) {
        if (a.length != b.length) return !1;
        for (var c = 0; c < b.length; c++)
            if (a[c].compare && !a[c].compare(b[c]) || a[c] !== b[c]) return !1;
        return !0
    }

    function f(b) {
        b = b.replace(/\s{2,}/g, " ");
        var c = b.split(" ");
        return a.each(c, function(a) {
            "all" == this && (c[a] = "mix_all")
        }), "" == c[0] && c.shift(), c
    }
    var g = {
        init: function(e) {
            return this.each(function() {
                var f = window.navigator.appVersion.match(/Chrome\/(\d+)\./),
                    f = f ? parseInt(f[1], 10) : !1,
                    g = function(a) {
                        a = document.getElementById(a);
                        var b = a.parentElement,
                            c = document.createElement("div"),
                            d = document.createDocumentFragment();
                        b.insertBefore(c, a), d.appendChild(a), b.replaceChild(a, c)
                    };
                (f && 31 == f || 32 == f) && g(this.id);
                var h = {
                    targetSelector: ".mix",
                    filterSelector: ".filter",
                    sortSelector: ".sort",
                    buttonEvent: "click",
                    effects: ["fade", "scale"],
                    listEffects: null,
                    easing: "smooth",
                    layoutMode: "grid",
                    targetDisplayGrid: "inline-block",
                    targetDisplayList: "block",
                    listClass: "",
                    gridClass: "",
                    transitionSpeed: 600,
                    showOnLoad: "all",
                    sortOnLoad: !1,
                    multiFilter: !1,
                    filterLogic: "or",
                    resizeContainer: !0,
                    minHeight: 0,
                    failClass: "fail",
                    perspectiveDistance: "3000",
                    perspectiveOrigin: "50% 50%",
                    animateGridList: !0,
                    onMixLoad: null,
                    onMixStart: null,
                    onMixEnd: null,
                    container: null,
                    origOrder: [],
                    startOrder: [],
                    newOrder: [],
                    origSort: [],
                    checkSort: [],
                    filter: "",
                    mixing: !1,
                    origDisplay: "",
                    origLayout: "",
                    origHeight: 0,
                    newHeight: 0,
                    isTouch: !1,
                    resetDelay: 0,
                    failsafe: null,
                    prefix: "",
                    easingFallback: "ease-in-out",
                    transition: {},
                    perspective: {},
                    clean: {},
                    fade: "1",
                    scale: "",
                    rotateX: "",
                    rotateY: "",
                    rotateZ: "",
                    blur: "",
                    grayscale: ""
                };
                e && a.extend(h, e), this.config = h, a.support.touch = "ontouchend" in document, a.support.touch && (h.isTouch = !0, h.resetDelay = 350), h.container = a(this);
                var i = h.container;
                if (h.prefix = d(i[0]), h.prefix = h.prefix ? "-" + h.prefix.toLowerCase() + "-" : "", i.find(h.targetSelector).each(function() {
                    h.origOrder.push(a(this))
                }), h.sortOnLoad) {
                    var j;
                    a.isArray(h.sortOnLoad) ? (f = h.sortOnLoad[0], j = h.sortOnLoad[1], a(h.sortSelector + "[data-sort=" + h.sortOnLoad[0] + "][data-order=" + h.sortOnLoad[1] + "]").addClass("active")) : (a(h.sortSelector + "[data-sort=" + h.sortOnLoad + "]").addClass("active"), f = h.sortOnLoad, h.sortOnLoad = "desc"), c(f, j, i, h)
                }
                for (j = 0; 2 > j; j++) f = 0 == j ? f = h.prefix : "", h.transition[f + "transition"] = "all " + h.transitionSpeed + "ms ease-in-out", h.perspective[f + "perspective"] = h.perspectiveDistance + "px", h.perspective[f + "perspective-origin"] = h.perspectiveOrigin;
                for (j = 0; 2 > j; j++) f = 0 == j ? f = h.prefix : "", h.clean[f + "transition"] = "none";
                "list" == h.layoutMode ? (i.addClass(h.listClass), h.origDisplay = h.targetDisplayList) : (i.addClass(h.gridClass), h.origDisplay = h.targetDisplayGrid), h.origLayout = h.layoutMode, j = h.showOnLoad.split(" "), a.each(j, function() {
                    a(h.filterSelector + '[data-filter="' + this + '"]').addClass("active")
                }), i.find(h.targetSelector).addClass("mix_all"), "all" == j[0] && (j[0] = "mix_all", h.showOnLoad = "mix_all");
                var k = a();
                a.each(j, function() {
                    k = k.add(a("." + this))
                }), k.each(function() {
                    var b = a(this);
                    "list" == h.layoutMode ? b.css("display", h.targetDisplayList) : b.css("display", h.targetDisplayGrid), b.css(h.transition)
                }), setTimeout(function() {
                    h.mixing = !0, k.css("opacity", "1"), setTimeout(function() {
                        if (k.removeStyle(h.prefix + "transition, transition").css("list" == h.layoutMode ? {
                            display: h.targetDisplayList,
                            opacity: 1
                        } : {
                            display: h.targetDisplayGrid,
                            opacity: 1
                        }), h.mixing = !1, "function" == typeof h.onMixLoad) {
                            var a = h.onMixLoad.call(this, h);
                            h = a ? a : h
                        }
                    }, h.transitionSpeed)
                }, 10), h.filter = h.showOnLoad, a(h.sortSelector).bind(h.buttonEvent, function() {
                    if (!h.mixing) {
                        var c = a(this),
                            d = c.attr("data-sort"),
                            e = c.attr("data-order");
                        if (c.hasClass("active")) {
                            if ("random" != d) return !1
                        } else a(h.sortSelector).removeClass("active"), c.addClass("active");
                        i.find(h.targetSelector).each(function() {
                            h.startOrder.push(a(this))
                        }), b(h.filter, d, e, i, h)
                    }
                }), a(h.filterSelector).bind(h.buttonEvent, function() {
                    if (!h.mixing) {
                        var c = a(this);
                        if (0 == h.multiFilter) a(h.filterSelector).removeClass("active"), c.addClass("active"), h.filter = c.attr("data-filter"), a(h.filterSelector + '[data-filter="' + h.filter + '"]').addClass("active");
                        else {
                            var d = c.attr("data-filter");
                            c.hasClass("active") ? (c.removeClass("active"), h.filter = h.filter.replace(RegExp("(\\s|^)" + d), "")) : (c.addClass("active"), h.filter = h.filter + " " + d)
                        }
                        b(h.filter, null, null, i, h)
                    }
                })
            })
        },
        toGrid: function() {
            return this.each(function() {
                var c = this.config;
                "grid" != c.layoutMode && (c.layoutMode = "grid", b(c.filter, null, null, a(this), c))
            })
        },
        toList: function() {
            return this.each(function() {
                var c = this.config;
                "list" != c.layoutMode && (c.layoutMode = "list", b(c.filter, null, null, a(this), c))
            })
        },
        filter: function(c) {
            return this.each(function() {
                var d = this.config;
                d.mixing || (a(d.filterSelector).removeClass("active"), a(d.filterSelector + '[data-filter="' + c + '"]').addClass("active"), b(c, null, null, a(this), d))
            })
        },
        sort: function(c) {
            return this.each(function() {
                var d = this.config,
                    e = a(this);
                if (!d.mixing) {
                    if (a(d.sortSelector).removeClass("active"), a.isArray(c)) {
                        var f = c[0],
                            g = c[1];
                        a(d.sortSelector + '[data-sort="' + c[0] + '"][data-order="' + c[1] + '"]').addClass("active")
                    } else a(d.sortSelector + '[data-sort="' + c + '"]').addClass("active"), f = c, g = "desc";
                    e.find(d.targetSelector).each(function() {
                        d.startOrder.push(a(this))
                    }), b(d.filter, f, g, e, d)
                }
            })
        },
        multimix: function(c) {
            return this.each(function() {
                var d = this.config,
                    e = a(this);
                multiOut = {
                    filter: d.filter,
                    sort: null,
                    order: "desc",
                    layoutMode: d.layoutMode
                }, a.extend(multiOut, c), d.mixing || (a(d.filterSelector).add(d.sortSelector).removeClass("active"), a(d.filterSelector + '[data-filter="' + multiOut.filter + '"]').addClass("active"), "undefined" != typeof multiOut.sort && (a(d.sortSelector + '[data-sort="' + multiOut.sort + '"][data-order="' + multiOut.order + '"]').addClass("active"), e.find(d.targetSelector).each(function() {
                    d.startOrder.push(a(this))
                })), d.layoutMode = multiOut.layoutMode, b(multiOut.filter, multiOut.sort, multiOut.order, e, d))
            })
        },
        remix: function(c) {
            return this.each(function() {
                var d = this.config,
                    e = a(this);
                d.origOrder = [], e.find(d.targetSelector).each(function() {
                    var b = a(this);
                    b.addClass("mix_all"), d.origOrder.push(b)
                }), d.mixing || "undefined" == typeof c || (a(d.filterSelector).removeClass("active"), a(d.filterSelector + '[data-filter="' + c + '"]').addClass("active"), b(c, null, null, e, d))
            })
        }
    };
    a.fn.mixitup = function(a) {
        return g[a] ? g[a].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof a && a ? void 0 : g.init.apply(this, arguments)
    }, a.fn.removeStyle = function(b) {
        return this.each(function() {
            var c = a(this);
            b = b.replace(/\s+/g, "");
            var d = b.split(",");
            a.each(d, function() {
                var a = RegExp(this.toString() + "[^;]+;?", "g");
                c.attr("style", function(b, c) {
                    return c ? c.replace(a, "") : void 0
                })
            })
        })
    }
}(jQuery),
function(a) {
    function b() {}

    function c(a) {
        function c(b) {
            b.prototype.option || (b.prototype.option = function(b) {
                a.isPlainObject(b) && (this.options = a.extend(!0, this.options, b))
            })
        }

        function e(b, c) {
            a.fn[b] = function(e) {
                if ("string" == typeof e) {
                    for (var g = d.call(arguments, 1), h = 0, i = this.length; i > h; h++) {
                        var j = this[h],
                            k = a.data(j, b);
                        if (k)
                            if (a.isFunction(k[e]) && "_" !== e.charAt(0)) {
                                var l = k[e].apply(k, g);
                                if (void 0 !== l) return l
                            } else f("no such method '" + e + "' for " + b + " instance");
                            else f("cannot call methods on " + b + " prior to initialization; attempted to call '" + e + "'")
                    }
                    return this
                }
                return this.each(function() {
                    var d = a.data(this, b);
                    d ? (d.option(e), d._init()) : (d = new c(this, e), a.data(this, b, d))
                })
            }
        }
        if (a) {
            var f = "undefined" == typeof console ? b : function(a) {
                    console.error(a)
                };
            return a.bridget = function(a, b) {
                c(b), e(a, b)
            }, a.bridget
        }
    }
    var d = Array.prototype.slice;
    "function" == typeof define && define.amd ? define("jquery-bridget/jquery.bridget", ["jquery"], c) : c(a.jQuery)
}(window),
function(a) {
    function b(b) {
        var c = a.event;
        return c.target = c.target || c.srcElement || b, c
    }
    var c = document.documentElement,
        d = function() {};
    c.addEventListener ? d = function(a, b, c) {
        a.addEventListener(b, c, !1)
    } : c.attachEvent && (d = function(a, c, d) {
        a[c + d] = d.handleEvent ? function() {
            var c = b(a);
            d.handleEvent.call(d, c)
        } : function() {
            var c = b(a);
            d.call(a, c)
        }, a.attachEvent("on" + c, a[c + d])
    });
    var e = function() {};
    c.removeEventListener ? e = function(a, b, c) {
        a.removeEventListener(b, c, !1)
    } : c.detachEvent && (e = function(a, b, c) {
        a.detachEvent("on" + b, a[b + c]);
        try {
            delete a[b + c]
        } catch (d) {
            a[b + c] = void 0
        }
    });
    var f = {
        bind: d,
        unbind: e
    };
    "function" == typeof define && define.amd ? define("eventie/eventie", f) : "object" == typeof exports ? module.exports = f : a.eventie = f
}(this),
function(a) {
    function b(a) {
        "function" == typeof a && (b.isReady ? a() : f.push(a))
    }

    function c(a) {
        var c = "readystatechange" === a.type && "complete" !== e.readyState;
        if (!b.isReady && !c) {
            b.isReady = !0;
            for (var d = 0, g = f.length; g > d; d++) {
                var h = f[d];
                h()
            }
        }
    }

    function d(d) {
        return d.bind(e, "DOMContentLoaded", c), d.bind(e, "readystatechange", c), d.bind(a, "load", c), b
    }
    var e = a.document,
        f = [];
    b.isReady = !1, "function" == typeof define && define.amd ? (b.isReady = "function" == typeof requirejs, define("doc-ready/doc-ready", ["eventie/eventie"], d)) : a.docReady = d(a.eventie)
}(this),
function() {
    function a() {}

    function b(a, b) {
        for (var c = a.length; c--;)
            if (a[c].listener === b) return c;
        return -1
    }

    function c(a) {
        return function() {
            return this[a].apply(this, arguments)
        }
    }
    var d = a.prototype,
        e = this,
        f = e.EventEmitter;
    d.getListeners = function(a) {
        var b, c, d = this._getEvents();
        if (a instanceof RegExp) {
            b = {};
            for (c in d) d.hasOwnProperty(c) && a.test(c) && (b[c] = d[c])
        } else b = d[a] || (d[a] = []);
        return b
    }, d.flattenListeners = function(a) {
        var b, c = [];
        for (b = 0; b < a.length; b += 1) c.push(a[b].listener);
        return c
    }, d.getListenersAsObject = function(a) {
        var b, c = this.getListeners(a);
        return c instanceof Array && (b = {}, b[a] = c), b || c
    }, d.addListener = function(a, c) {
        var d, e = this.getListenersAsObject(a),
            f = "object" == typeof c;
        for (d in e) e.hasOwnProperty(d) && -1 === b(e[d], c) && e[d].push(f ? c : {
            listener: c,
            once: !1
        });
        return this
    }, d.on = c("addListener"), d.addOnceListener = function(a, b) {
        return this.addListener(a, {
            listener: b,
            once: !0
        })
    }, d.once = c("addOnceListener"), d.defineEvent = function(a) {
        return this.getListeners(a), this
    }, d.defineEvents = function(a) {
        for (var b = 0; b < a.length; b += 1) this.defineEvent(a[b]);
        return this
    }, d.removeListener = function(a, c) {
        var d, e, f = this.getListenersAsObject(a);
        for (e in f) f.hasOwnProperty(e) && (d = b(f[e], c), -1 !== d && f[e].splice(d, 1));
        return this
    }, d.off = c("removeListener"), d.addListeners = function(a, b) {
        return this.manipulateListeners(!1, a, b)
    }, d.removeListeners = function(a, b) {
        return this.manipulateListeners(!0, a, b)
    }, d.manipulateListeners = function(a, b, c) {
        var d, e, f = a ? this.removeListener : this.addListener,
            g = a ? this.removeListeners : this.addListeners;
        if ("object" != typeof b || b instanceof RegExp)
            for (d = c.length; d--;) f.call(this, b, c[d]);
        else
            for (d in b) b.hasOwnProperty(d) && (e = b[d]) && ("function" == typeof e ? f.call(this, d, e) : g.call(this, d, e));
        return this
    }, d.removeEvent = function(a) {
        var b, c = typeof a,
            d = this._getEvents();
        if ("string" === c) delete d[a];
        else if (a instanceof RegExp)
            for (b in d) d.hasOwnProperty(b) && a.test(b) && delete d[b];
        else delete this._events;
        return this
    }, d.removeAllListeners = c("removeEvent"), d.emitEvent = function(a, b) {
        var c, d, e, f, g = this.getListenersAsObject(a);
        for (e in g)
            if (g.hasOwnProperty(e))
                for (d = g[e].length; d--;) c = g[e][d], c.once === !0 && this.removeListener(a, c.listener), f = c.listener.apply(this, b || []), f === this._getOnceReturnValue() && this.removeListener(a, c.listener);
        return this
    }, d.trigger = c("emitEvent"), d.emit = function(a) {
        var b = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(a, b)
    }, d.setOnceReturnValue = function(a) {
        return this._onceReturnValue = a, this
    }, d._getOnceReturnValue = function() {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, d._getEvents = function() {
        return this._events || (this._events = {})
    }, a.noConflict = function() {
        return e.EventEmitter = f, a
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function() {
        return a
    }) : "object" == typeof module && module.exports ? module.exports = a : this.EventEmitter = a
}.call(this),
function(a) {
    function b(a) {
        if (a) {
            if ("string" == typeof d[a]) return a;
            a = a.charAt(0).toUpperCase() + a.slice(1);
            for (var b, e = 0, f = c.length; f > e; e++)
                if (b = c[e] + a, "string" == typeof d[b]) return b
        }
    }
    var c = "Webkit Moz ms Ms O".split(" "),
        d = document.documentElement.style;
    "function" == typeof define && define.amd ? define("get-style-property/get-style-property", [], function() {
        return b
    }) : "object" == typeof exports ? module.exports = b : a.getStyleProperty = b
}(window),
function(a) {
    function b(a) {
        var b = parseFloat(a),
            c = -1 === a.indexOf("%") && !isNaN(b);
        return c && b
    }

    function c() {
        for (var a = {
            width: 0,
            height: 0,
            innerWidth: 0,
            innerHeight: 0,
            outerWidth: 0,
            outerHeight: 0
        }, b = 0, c = g.length; c > b; b++) {
            var d = g[b];
            a[d] = 0
        }
        return a
    }

    function d(a) {
        function d(a) {
            if ("string" == typeof a && (a = document.querySelector(a)), a && "object" == typeof a && a.nodeType) {
                var d = f(a);
                if ("none" === d.display) return c();
                var e = {};
                e.width = a.offsetWidth, e.height = a.offsetHeight;
                for (var k = e.isBorderBox = !(!j || !d[j] || "border-box" !== d[j]), l = 0, m = g.length; m > l; l++) {
                    var n = g[l],
                        o = d[n];
                    o = h(a, o);
                    var p = parseFloat(o);
                    e[n] = isNaN(p) ? 0 : p
                }
                var q = e.paddingLeft + e.paddingRight,
                    r = e.paddingTop + e.paddingBottom,
                    s = e.marginLeft + e.marginRight,
                    t = e.marginTop + e.marginBottom,
                    u = e.borderLeftWidth + e.borderRightWidth,
                    v = e.borderTopWidth + e.borderBottomWidth,
                    w = k && i,
                    x = b(d.width);
                x !== !1 && (e.width = x + (w ? 0 : q + u));
                var y = b(d.height);
                return y !== !1 && (e.height = y + (w ? 0 : r + v)), e.innerWidth = e.width - (q + u), e.innerHeight = e.height - (r + v), e.outerWidth = e.width + s, e.outerHeight = e.height + t, e
            }
        }

        function h(a, b) {
            if (e || -1 === b.indexOf("%")) return b;
            var c = a.style,
                d = c.left,
                f = a.runtimeStyle,
                g = f && f.left;
            return g && (f.left = a.currentStyle.left), c.left = b, b = c.pixelLeft, c.left = d, g && (f.left = g), b
        }
        var i, j = a("boxSizing");
        return function() {
            if (j) {
                var a = document.createElement("div");
                a.style.width = "200px", a.style.padding = "1px 2px 3px 4px", a.style.borderStyle = "solid", a.style.borderWidth = "1px 2px 3px 4px", a.style[j] = "border-box";
                var c = document.body || document.documentElement;
                c.appendChild(a);
                var d = f(a);
                i = 200 === b(d.width), c.removeChild(a)
            }
        }(), d
    }
    var e = a.getComputedStyle,
        f = e ? function(a) {
            return e(a, null)
        } : function(a) {
            return a.currentStyle
        }, g = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"];
    "function" == typeof define && define.amd ? define("get-size/get-size", ["get-style-property/get-style-property"], d) : "object" == typeof exports ? module.exports = d(require("get-style-property")) : a.getSize = d(a.getStyleProperty)
}(window),
function(a, b) {
    function c(a, b) {
        return a[h](b)
    }

    function d(a) {
        if (!a.parentNode) {
            var b = document.createDocumentFragment();
            b.appendChild(a)
        }
    }

    function e(a, b) {
        d(a);
        for (var c = a.parentNode.querySelectorAll(b), e = 0, f = c.length; f > e; e++)
            if (c[e] === a) return !0;
        return !1
    }

    function f(a, b) {
        return d(a), c(a, b)
    }
    var g, h = function() {
            if (b.matchesSelector) return "matchesSelector";
            for (var a = ["webkit", "moz", "ms", "o"], c = 0, d = a.length; d > c; c++) {
                var e = a[c],
                    f = e + "MatchesSelector";
                if (b[f]) return f
            }
        }();
    if (h) {
        var i = document.createElement("div"),
            j = c(i, "div");
        g = j ? c : f
    } else g = e;
    "function" == typeof define && define.amd ? define("matches-selector/matches-selector", [], function() {
        return g
    }) : window.matchesSelector = g
}(this, Element.prototype),
function(a) {
    function b(a, b) {
        for (var c in b) a[c] = b[c];
        return a
    }

    function c(a) {
        for (var b in a) return !1;
        return b = null, !0
    }

    function d(a) {
        return a.replace(/([A-Z])/g, function(a) {
            return "-" + a.toLowerCase()
        })
    }

    function e(a, e, f) {
        function h(a, b) {
            a && (this.element = a, this.layout = b, this.position = {
                x: 0,
                y: 0
            }, this._create())
        }
        var i = f("transition"),
            j = f("transform"),
            k = i && j,
            l = !! f("perspective"),
            m = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "otransitionend",
                transition: "transitionend"
            }[i],
            n = ["transform", "transition", "transitionDuration", "transitionProperty"],
            o = function() {
                for (var a = {}, b = 0, c = n.length; c > b; b++) {
                    var d = n[b],
                        e = f(d);
                    e && e !== d && (a[d] = e)
                }
                return a
            }();
        b(h.prototype, a.prototype), h.prototype._create = function() {
            this._transn = {
                ingProperties: {},
                clean: {},
                onEnd: {}
            }, this.css({
                position: "absolute"
            })
        }, h.prototype.handleEvent = function(a) {
            var b = "on" + a.type;
            this[b] && this[b](a)
        }, h.prototype.getSize = function() {
            this.size = e(this.element)
        }, h.prototype.css = function(a) {
            var b = this.element.style;
            for (var c in a) {
                var d = o[c] || c;
                b[d] = a[c]
            }
        }, h.prototype.getPosition = function() {
            var a = g(this.element),
                b = this.layout.options,
                c = b.isOriginLeft,
                d = b.isOriginTop,
                e = parseInt(a[c ? "left" : "right"], 10),
                f = parseInt(a[d ? "top" : "bottom"], 10);
            e = isNaN(e) ? 0 : e, f = isNaN(f) ? 0 : f;
            var h = this.layout.size;
            e -= c ? h.paddingLeft : h.paddingRight, f -= d ? h.paddingTop : h.paddingBottom, this.position.x = e, this.position.y = f
        }, h.prototype.layoutPosition = function() {
            var a = this.layout.size,
                b = this.layout.options,
                c = {};
            b.isOriginLeft ? (c.left = this.position.x + a.paddingLeft + "px", c.right = "") : (c.right = this.position.x + a.paddingRight + "px", c.left = ""), b.isOriginTop ? (c.top = this.position.y + a.paddingTop + "px", c.bottom = "") : (c.bottom = this.position.y + a.paddingBottom + "px", c.top = ""), this.css(c), this.emitEvent("layout", [this])
        };
        var p = l ? function(a, b) {
                return "translate3d(" + a + "px, " + b + "px, 0)"
            } : function(a, b) {
                return "translate(" + a + "px, " + b + "px)"
            };
        h.prototype._transitionTo = function(a, b) {
            this.getPosition();
            var c = this.position.x,
                d = this.position.y,
                e = parseInt(a, 10),
                f = parseInt(b, 10),
                g = e === this.position.x && f === this.position.y;
            if (this.setPosition(a, b), g && !this.isTransitioning) return void this.layoutPosition();
            var h = a - c,
                i = b - d,
                j = {}, k = this.layout.options;
            h = k.isOriginLeft ? h : -h, i = k.isOriginTop ? i : -i, j.transform = p(h, i), this.transition({
                to: j,
                onTransitionEnd: {
                    transform: this.layoutPosition
                },
                isCleaning: !0
            })
        }, h.prototype.goTo = function(a, b) {
            this.setPosition(a, b), this.layoutPosition()
        }, h.prototype.moveTo = k ? h.prototype._transitionTo : h.prototype.goTo, h.prototype.setPosition = function(a, b) {
            this.position.x = parseInt(a, 10), this.position.y = parseInt(b, 10)
        }, h.prototype._nonTransition = function(a) {
            this.css(a.to), a.isCleaning && this._removeStyles(a.to);
            for (var b in a.onTransitionEnd) a.onTransitionEnd[b].call(this)
        }, h.prototype._transition = function(a) {
            if (!parseFloat(this.layout.options.transitionDuration)) return void this._nonTransition(a);
            var b = this._transn;
            for (var c in a.onTransitionEnd) b.onEnd[c] = a.onTransitionEnd[c];
            for (c in a.to) b.ingProperties[c] = !0, a.isCleaning && (b.clean[c] = !0);
            if (a.from) {
                this.css(a.from);
                var d = this.element.offsetHeight;
                d = null
            }
            this.enableTransition(a.to), this.css(a.to), this.isTransitioning = !0
        };
        var q = j && d(j) + ",opacity";
        h.prototype.enableTransition = function() {
            this.isTransitioning || (this.css({
                transitionProperty: q,
                transitionDuration: this.layout.options.transitionDuration
            }), this.element.addEventListener(m, this, !1))
        }, h.prototype.transition = h.prototype[i ? "_transition" : "_nonTransition"], h.prototype.onwebkitTransitionEnd = function(a) {
            this.ontransitionend(a)
        }, h.prototype.onotransitionend = function(a) {
            this.ontransitionend(a)
        };
        var r = {
            "-webkit-transform": "transform",
            "-moz-transform": "transform",
            "-o-transform": "transform"
        };
        h.prototype.ontransitionend = function(a) {
            if (a.target === this.element) {
                var b = this._transn,
                    d = r[a.propertyName] || a.propertyName;
                if (delete b.ingProperties[d], c(b.ingProperties) && this.disableTransition(), d in b.clean && (this.element.style[a.propertyName] = "", delete b.clean[d]), d in b.onEnd) {
                    var e = b.onEnd[d];
                    e.call(this), delete b.onEnd[d]
                }
                this.emitEvent("transitionEnd", [this])
            }
        }, h.prototype.disableTransition = function() {
            this.removeTransitionStyles(), this.element.removeEventListener(m, this, !1), this.isTransitioning = !1
        }, h.prototype._removeStyles = function(a) {
            var b = {};
            for (var c in a) b[c] = "";
            this.css(b)
        };
        var s = {
            transitionProperty: "",
            transitionDuration: ""
        };
        return h.prototype.removeTransitionStyles = function() {
            this.css(s)
        }, h.prototype.removeElem = function() {
            this.element.parentNode.removeChild(this.element), this.emitEvent("remove", [this])
        }, h.prototype.remove = function() {
            if (!i || !parseFloat(this.layout.options.transitionDuration)) return void this.removeElem();
            var a = this;
            this.on("transitionEnd", function() {
                return a.removeElem(), !0
            }), this.hide()
        }, h.prototype.reveal = function() {
            delete this.isHidden, this.css({
                display: ""
            });
            var a = this.layout.options;
            this.transition({
                from: a.hiddenStyle,
                to: a.visibleStyle,
                isCleaning: !0
            })
        }, h.prototype.hide = function() {
            this.isHidden = !0, this.css({
                display: ""
            });
            var a = this.layout.options;
            this.transition({
                from: a.visibleStyle,
                to: a.hiddenStyle,
                isCleaning: !0,
                onTransitionEnd: {
                    opacity: function() {
                        this.isHidden && this.css({
                            display: "none"
                        })
                    }
                }
            })
        }, h.prototype.destroy = function() {
            this.css({
                position: "",
                left: "",
                right: "",
                top: "",
                bottom: "",
                transition: "",
                transform: ""
            })
        }, h
    }
    var f = a.getComputedStyle,
        g = f ? function(a) {
            return f(a, null)
        } : function(a) {
            return a.currentStyle
        };
    "function" == typeof define && define.amd ? define("outlayer/item", ["eventEmitter/EventEmitter", "get-size/get-size", "get-style-property/get-style-property"], e) : (a.Outlayer = {}, a.Outlayer.Item = e(a.EventEmitter, a.getSize, a.getStyleProperty))
}(window),
function(a) {
    function b(a, b) {
        for (var c in b) a[c] = b[c];
        return a
    }

    function c(a) {
        return "[object Array]" === l.call(a)
    }

    function d(a) {
        var b = [];
        if (c(a)) b = a;
        else if (a && "number" == typeof a.length)
            for (var d = 0, e = a.length; e > d; d++) b.push(a[d]);
        else b.push(a);
        return b
    }

    function e(a, b) {
        var c = n(b, a); - 1 !== c && b.splice(c, 1)
    }

    function f(a) {
        return a.replace(/(.)([A-Z])/g, function(a, b, c) {
            return b + "-" + c
        }).toLowerCase()
    }

    function g(c, g, l, n, o, p) {
        function q(a, c) {
            if ("string" == typeof a && (a = h.querySelector(a)), !a || !m(a)) return void(i && i.error("Bad " + this.constructor.namespace + " element: " + a));
            this.element = a, this.options = b({}, this.constructor.defaults), this.option(c);
            var d = ++r;
            this.element.outlayerGUID = d, s[d] = this, this._create(), this.options.isInitLayout && this.layout()
        }
        var r = 0,
            s = {};
        return q.namespace = "outlayer", q.Item = p, q.defaults = {
            containerStyle: {
                position: "relative"
            },
            isInitLayout: !0,
            isOriginLeft: !0,
            isOriginTop: !0,
            isResizeBound: !0,
            isResizingContainer: !0,
            transitionDuration: "0.4s",
            hiddenStyle: {
                opacity: 0,
                transform: "scale(0.001)"
            },
            visibleStyle: {
                opacity: 1,
                transform: "scale(1)"
            }
        }, b(q.prototype, l.prototype), q.prototype.option = function(a) {
            b(this.options, a)
        }, q.prototype._create = function() {
            this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), b(this.element.style, this.options.containerStyle), this.options.isResizeBound && this.bindResize()
        }, q.prototype.reloadItems = function() {
            this.items = this._itemize(this.element.children)
        }, q.prototype._itemize = function(a) {
            for (var b = this._filterFindItemElements(a), c = this.constructor.Item, d = [], e = 0, f = b.length; f > e; e++) {
                var g = b[e],
                    h = new c(g, this);
                d.push(h)
            }
            return d
        }, q.prototype._filterFindItemElements = function(a) {
            a = d(a);
            for (var b = this.options.itemSelector, c = [], e = 0, f = a.length; f > e; e++) {
                var g = a[e];
                if (m(g))
                    if (b) {
                        o(g, b) && c.push(g);
                        for (var h = g.querySelectorAll(b), i = 0, j = h.length; j > i; i++) c.push(h[i])
                    } else c.push(g)
            }
            return c
        }, q.prototype.getItemElements = function() {
            for (var a = [], b = 0, c = this.items.length; c > b; b++) a.push(this.items[b].element);
            return a
        }, q.prototype.layout = function() {
            this._resetLayout(), this._manageStamps();
            var a = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
            this.layoutItems(this.items, a), this._isLayoutInited = !0
        }, q.prototype._init = q.prototype.layout, q.prototype._resetLayout = function() {
            this.getSize()
        }, q.prototype.getSize = function() {
            this.size = n(this.element)
        }, q.prototype._getMeasurement = function(a, b) {
            var c, d = this.options[a];
            d ? ("string" == typeof d ? c = this.element.querySelector(d) : m(d) && (c = d), this[a] = c ? n(c)[b] : d) : this[a] = 0
        }, q.prototype.layoutItems = function(a, b) {
            a = this._getItemsForLayout(a), this._layoutItems(a, b), this._postLayout()
        }, q.prototype._getItemsForLayout = function(a) {
            for (var b = [], c = 0, d = a.length; d > c; c++) {
                var e = a[c];
                e.isIgnored || b.push(e)
            }
            return b
        }, q.prototype._layoutItems = function(a, b) {
            function c() {
                d.emitEvent("layoutComplete", [d, a])
            }
            var d = this;
            if (!a || !a.length) return void c();
            this._itemsOn(a, "layout", c);
            for (var e = [], f = 0, g = a.length; g > f; f++) {
                var h = a[f],
                    i = this._getItemLayoutPosition(h);
                i.item = h, i.isInstant = b || h.isLayoutInstant, e.push(i)
            }
            this._processLayoutQueue(e)
        }, q.prototype._getItemLayoutPosition = function() {
            return {
                x: 0,
                y: 0
            }
        }, q.prototype._processLayoutQueue = function(a) {
            for (var b = 0, c = a.length; c > b; b++) {
                var d = a[b];
                this._positionItem(d.item, d.x, d.y, d.isInstant)
            }
        }, q.prototype._positionItem = function(a, b, c, d) {
            d ? a.goTo(b, c) : a.moveTo(b, c)
        }, q.prototype._postLayout = function() {
            this.resizeContainer()
        }, q.prototype.resizeContainer = function() {
            if (this.options.isResizingContainer) {
                var a = this._getContainerSize();
                a && (this._setContainerMeasure(a.width, !0), this._setContainerMeasure(a.height, !1))
            }
        }, q.prototype._getContainerSize = k, q.prototype._setContainerMeasure = function(a, b) {
            if (void 0 !== a) {
                var c = this.size;
                c.isBorderBox && (a += b ? c.paddingLeft + c.paddingRight + c.borderLeftWidth + c.borderRightWidth : c.paddingBottom + c.paddingTop + c.borderTopWidth + c.borderBottomWidth), a = Math.max(a, 0), this.element.style[b ? "width" : "height"] = a + "px"
            }
        }, q.prototype._itemsOn = function(a, b, c) {
            function d() {
                return e++, e === f && c.call(g), !0
            }
            for (var e = 0, f = a.length, g = this, h = 0, i = a.length; i > h; h++) {
                var j = a[h];
                j.on(b, d)
            }
        }, q.prototype.ignore = function(a) {
            var b = this.getItem(a);
            b && (b.isIgnored = !0)
        }, q.prototype.unignore = function(a) {
            var b = this.getItem(a);
            b && delete b.isIgnored
        }, q.prototype.stamp = function(a) {
            if (a = this._find(a)) {
                this.stamps = this.stamps.concat(a);
                for (var b = 0, c = a.length; c > b; b++) {
                    var d = a[b];
                    this.ignore(d)
                }
            }
        }, q.prototype.unstamp = function(a) {
            if (a = this._find(a))
                for (var b = 0, c = a.length; c > b; b++) {
                    var d = a[b];
                    e(d, this.stamps), this.unignore(d)
                }
        }, q.prototype._find = function(a) {
            return a ? ("string" == typeof a && (a = this.element.querySelectorAll(a)), a = d(a)) : void 0
        }, q.prototype._manageStamps = function() {
            if (this.stamps && this.stamps.length) {
                this._getBoundingRect();
                for (var a = 0, b = this.stamps.length; b > a; a++) {
                    var c = this.stamps[a];
                    this._manageStamp(c)
                }
            }
        }, q.prototype._getBoundingRect = function() {
            var a = this.element.getBoundingClientRect(),
                b = this.size;
            this._boundingRect = {
                left: a.left + b.paddingLeft + b.borderLeftWidth,
                top: a.top + b.paddingTop + b.borderTopWidth,
                right: a.right - (b.paddingRight + b.borderRightWidth),
                bottom: a.bottom - (b.paddingBottom + b.borderBottomWidth)
            }
        }, q.prototype._manageStamp = k, q.prototype._getElementOffset = function(a) {
            var b = a.getBoundingClientRect(),
                c = this._boundingRect,
                d = n(a),
                e = {
                    left: b.left - c.left - d.marginLeft,
                    top: b.top - c.top - d.marginTop,
                    right: c.right - b.right - d.marginRight,
                    bottom: c.bottom - b.bottom - d.marginBottom
                };
            return e
        }, q.prototype.handleEvent = function(a) {
            var b = "on" + a.type;
            this[b] && this[b](a)
        }, q.prototype.bindResize = function() {
            this.isResizeBound || (c.bind(a, "resize", this), this.isResizeBound = !0)
        }, q.prototype.unbindResize = function() {
            this.isResizeBound && c.unbind(a, "resize", this), this.isResizeBound = !1
        }, q.prototype.onresize = function() {
            function a() {
                b.resize(), delete b.resizeTimeout
            }
            this.resizeTimeout && clearTimeout(this.resizeTimeout);
            var b = this;
            this.resizeTimeout = setTimeout(a, 100)
        }, q.prototype.resize = function() {
            this.isResizeBound && this.needsResizeLayout() && this.layout()
        }, q.prototype.needsResizeLayout = function() {
            var a = n(this.element),
                b = this.size && a;
            return b && a.innerWidth !== this.size.innerWidth
        }, q.prototype.addItems = function(a) {
            var b = this._itemize(a);
            return b.length && (this.items = this.items.concat(b)), b
        }, q.prototype.appended = function(a) {
            var b = this.addItems(a);
            b.length && (this.layoutItems(b, !0), this.reveal(b))
        }, q.prototype.prepended = function(a) {
            var b = this._itemize(a);
            if (b.length) {
                var c = this.items.slice(0);
                this.items = b.concat(c), this._resetLayout(), this._manageStamps(), this.layoutItems(b, !0), this.reveal(b), this.layoutItems(c)
            }
        }, q.prototype.reveal = function(a) {
            var b = a && a.length;
            if (b)
                for (var c = 0; b > c; c++) {
                    var d = a[c];
                    d.reveal()
                }
        }, q.prototype.hide = function(a) {
            var b = a && a.length;
            if (b)
                for (var c = 0; b > c; c++) {
                    var d = a[c];
                    d.hide()
                }
        }, q.prototype.getItem = function(a) {
            for (var b = 0, c = this.items.length; c > b; b++) {
                var d = this.items[b];
                if (d.element === a) return d
            }
        }, q.prototype.getItems = function(a) {
            if (a && a.length) {
                for (var b = [], c = 0, d = a.length; d > c; c++) {
                    var e = a[c],
                        f = this.getItem(e);
                    f && b.push(f)
                }
                return b
            }
        }, q.prototype.remove = function(a) {
            a = d(a);
            var b = this.getItems(a);
            if (b && b.length) {
                this._itemsOn(b, "remove", function() {
                    this.emitEvent("removeComplete", [this, b])
                });
                for (var c = 0, f = b.length; f > c; c++) {
                    var g = b[c];
                    g.remove(), e(g, this.items)
                }
            }
        }, q.prototype.destroy = function() {
            var a = this.element.style;
            a.height = "", a.position = "", a.width = "";
            for (var b = 0, c = this.items.length; c > b; b++) {
                var d = this.items[b];
                d.destroy()
            }
            this.unbindResize(), delete this.element.outlayerGUID, j && j.removeData(this.element, this.constructor.namespace)
        }, q.data = function(a) {
            var b = a && a.outlayerGUID;
            return b && s[b]
        }, q.create = function(a, c) {
            function d() {
                q.apply(this, arguments)
            }
            return Object.create ? d.prototype = Object.create(q.prototype) : b(d.prototype, q.prototype), d.prototype.constructor = d, d.defaults = b({}, q.defaults), b(d.defaults, c), d.prototype.settings = {}, d.namespace = a, d.data = q.data, d.Item = function() {
                p.apply(this, arguments)
            }, d.Item.prototype = new p, g(function() {
                for (var b = f(a), c = h.querySelectorAll(".js-" + b), e = "data-" + b + "-options", g = 0, k = c.length; k > g; g++) {
                    var l, m = c[g],
                        n = m.getAttribute(e);
                    try {
                        l = n && JSON.parse(n)
                    } catch (o) {
                        i && i.error("Error parsing " + e + " on " + m.nodeName.toLowerCase() + (m.id ? "#" + m.id : "") + ": " + o);
                        continue
                    }
                    var p = new d(m, l);
                    j && j.data(m, a, p)
                }
            }), j && j.bridget && j.bridget(a, d), d
        }, q.Item = p, q
    }
    var h = a.document,
        i = a.console,
        j = a.jQuery,
        k = function() {}, l = Object.prototype.toString,
        m = "object" == typeof HTMLElement ? function(a) {
            return a instanceof HTMLElement
        } : function(a) {
            return a && "object" == typeof a && 1 === a.nodeType && "string" == typeof a.nodeName
        }, n = Array.prototype.indexOf ? function(a, b) {
            return a.indexOf(b)
        } : function(a, b) {
            for (var c = 0, d = a.length; d > c; c++)
                if (a[c] === b) return c;
            return -1
        };
    "function" == typeof define && define.amd ? define("outlayer/outlayer", ["eventie/eventie", "doc-ready/doc-ready", "eventEmitter/EventEmitter", "get-size/get-size", "matches-selector/matches-selector", "./item"], g) : a.Outlayer = g(a.eventie, a.docReady, a.EventEmitter, a.getSize, a.matchesSelector, a.Outlayer.Item)
}(window),
function(a) {
    function b(a) {
        function b() {
            a.Item.apply(this, arguments)
        }
        b.prototype = new a.Item, b.prototype._create = function() {
            this.id = this.layout.itemGUID++, a.Item.prototype._create.call(this), this.sortData = {}
        }, b.prototype.updateSortData = function() {
            if (!this.isIgnored) {
                this.sortData.id = this.id, this.sortData["original-order"] = this.id, this.sortData.random = Math.random();
                var a = this.layout.options.getSortData,
                    b = this.layout._sorters;
                for (var c in a) {
                    var d = b[c];
                    this.sortData[c] = d(this.element, this)
                }
            }
        };
        var c = b.prototype.destroy;
        return b.prototype.destroy = function() {
            c.apply(this, arguments), this.css({
                display: ""
            })
        }, b
    }
    "function" == typeof define && define.amd ? define("isotope/js/item", ["outlayer/outlayer"], b) : (a.Isotope = a.Isotope || {}, a.Isotope.Item = b(a.Outlayer))
}(window),
function(a) {
    function b(a, b) {
        function c(a) {
            this.isotope = a, a && (this.options = a.options[this.namespace], this.element = a.element, this.items = a.filteredItems, this.size = a.size)
        }
        return function() {
            function a(a) {
                return function() {
                    return b.prototype[a].apply(this.isotope, arguments)
                }
            }
            for (var d = ["_resetLayout", "_getItemLayoutPosition", "_manageStamp", "_getContainerSize", "_getElementOffset", "needsResizeLayout"], e = 0, f = d.length; f > e; e++) {
                var g = d[e];
                c.prototype[g] = a(g)
            }
        }(), c.prototype.needsVerticalResizeLayout = function() {
            var b = a(this.isotope.element),
                c = this.isotope.size && b;
            return c && b.innerHeight !== this.isotope.size.innerHeight
        }, c.prototype._getMeasurement = function() {
            this.isotope._getMeasurement.apply(this, arguments)
        }, c.prototype.getColumnWidth = function() {
            this.getSegmentSize("column", "Width")
        }, c.prototype.getRowHeight = function() {
            this.getSegmentSize("row", "Height")
        }, c.prototype.getSegmentSize = function(a, b) {
            var c = a + b,
                d = "outer" + b;
            if (this._getMeasurement(c, d), !this[c]) {
                var e = this.getFirstItemSize();
                this[c] = e && e[d] || this.isotope.size["inner" + b]
            }
        }, c.prototype.getFirstItemSize = function() {
            var b = this.isotope.filteredItems[0];
            return b && b.element && a(b.element)
        }, c.prototype.layout = function() {
            this.isotope.layout.apply(this.isotope, arguments)
        }, c.prototype.getSize = function() {
            this.isotope.getSize(), this.size = this.isotope.size
        }, c.modes = {}, c.create = function(a, b) {
            function d() {
                c.apply(this, arguments)
            }
            return d.prototype = new c, b && (d.options = b), d.prototype.namespace = a, c.modes[a] = d, d
        }, c
    }
    "function" == typeof define && define.amd ? define("isotope/js/layout-mode", ["get-size/get-size", "outlayer/outlayer"], b) : (a.Isotope = a.Isotope || {}, a.Isotope.LayoutMode = b(a.getSize, a.Outlayer))
}(window),
function(a) {
    function b(a, b) {
        var d = a.create("masonry");
        return d.prototype._resetLayout = function() {
            this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns();
            var a = this.cols;
            for (this.colYs = []; a--;) this.colYs.push(0);
            this.maxY = 0
        }, d.prototype.measureColumns = function() {
            if (this.getContainerWidth(), !this.columnWidth) {
                var a = this.items[0],
                    c = a && a.element;
                this.columnWidth = c && b(c).outerWidth || this.containerWidth
            }
            this.columnWidth += this.gutter, this.cols = Math.floor((this.containerWidth + this.gutter) / this.columnWidth), this.cols = Math.max(this.cols, 1)
        }, d.prototype.getContainerWidth = function() {
            var a = this.options.isFitWidth ? this.element.parentNode : this.element,
                c = b(a);
            this.containerWidth = c && c.innerWidth
        }, d.prototype._getItemLayoutPosition = function(a) {
            a.getSize();
            var b = a.size.outerWidth % this.columnWidth,
                d = b && 1 > b ? "round" : "ceil",
                e = Math[d](a.size.outerWidth / this.columnWidth);
            e = Math.min(e, this.cols);
            for (var f = this._getColGroup(e), g = Math.min.apply(Math, f), h = c(f, g), i = {
                    x: this.columnWidth * h,
                    y: g
                }, j = g + a.size.outerHeight, k = this.cols + 1 - f.length, l = 0; k > l; l++) this.colYs[h + l] = j;
            return i
        }, d.prototype._getColGroup = function(a) {
            if (2 > a) return this.colYs;
            for (var b = [], c = this.cols + 1 - a, d = 0; c > d; d++) {
                var e = this.colYs.slice(d, d + a);
                b[d] = Math.max.apply(Math, e)
            }
            return b
        }, d.prototype._manageStamp = function(a) {
            var c = b(a),
                d = this._getElementOffset(a),
                e = this.options.isOriginLeft ? d.left : d.right,
                f = e + c.outerWidth,
                g = Math.floor(e / this.columnWidth);
            g = Math.max(0, g);
            var h = Math.floor(f / this.columnWidth);
            h -= f % this.columnWidth ? 0 : 1, h = Math.min(this.cols - 1, h);
            for (var i = (this.options.isOriginTop ? d.top : d.bottom) + c.outerHeight, j = g; h >= j; j++) this.colYs[j] = Math.max(i, this.colYs[j])
        }, d.prototype._getContainerSize = function() {
            this.maxY = Math.max.apply(Math, this.colYs);
            var a = {
                height: this.maxY
            };
            return this.options.isFitWidth && (a.width = this._getContainerFitWidth()), a
        }, d.prototype._getContainerFitWidth = function() {
            for (var a = 0, b = this.cols; --b && 0 === this.colYs[b];) a++;
            return (this.cols - a) * this.columnWidth - this.gutter
        }, d.prototype.needsResizeLayout = function() {
            var a = this.containerWidth;
            return this.getContainerWidth(), a !== this.containerWidth
        }, d
    }
    var c = Array.prototype.indexOf ? function(a, b) {
            return a.indexOf(b)
        } : function(a, b) {
            for (var c = 0, d = a.length; d > c; c++) {
                var e = a[c];
                if (e === b) return c
            }
            return -1
        };
    "function" == typeof define && define.amd ? define("masonry/masonry", ["outlayer/outlayer", "get-size/get-size"], b) : a.Masonry = b(a.Outlayer, a.getSize)
}(window),
function(a) {
    function b(a, b) {
        for (var c in b) a[c] = b[c];
        return a
    }

    function c(a, c) {
        var d = a.create("masonry"),
            e = d.prototype._getElementOffset,
            f = d.prototype.layout,
            g = d.prototype._getMeasurement;
        b(d.prototype, c.prototype), d.prototype._getElementOffset = e, d.prototype.layout = f, d.prototype._getMeasurement = g;
        var h = d.prototype.measureColumns;
        d.prototype.measureColumns = function() {
            this.items = this.isotope.filteredItems, h.call(this)
        };
        var i = d.prototype._manageStamp;
        return d.prototype._manageStamp = function() {
            this.options.isOriginLeft = this.isotope.options.isOriginLeft, this.options.isOriginTop = this.isotope.options.isOriginTop, i.apply(this, arguments)
        }, d
    }
    "function" == typeof define && define.amd ? define("isotope/js/layout-modes/masonry", ["../layout-mode", "masonry/masonry"], c) : c(a.Isotope.LayoutMode, a.Masonry)
}(window),
function(a) {
    function b(a) {
        var b = a.create("fitRows");
        return b.prototype._resetLayout = function() {
            this.x = 0, this.y = 0, this.maxY = 0
        }, b.prototype._getItemLayoutPosition = function(a) {
            a.getSize(), 0 !== this.x && a.size.outerWidth + this.x > this.isotope.size.innerWidth && (this.x = 0, this.y = this.maxY);
            var b = {
                x: this.x,
                y: this.y
            };
            return this.maxY = Math.max(this.maxY, this.y + a.size.outerHeight), this.x += a.size.outerWidth, b
        }, b.prototype._getContainerSize = function() {
            return {
                height: this.maxY
            }
        }, b
    }
    "function" == typeof define && define.amd ? define("isotope/js/layout-modes/fit-rows", ["../layout-mode"], b) : b(a.Isotope.LayoutMode)
}(window),
function(a) {
    function b(a) {
        var b = a.create("vertical", {
            horizontalAlignment: 0
        });
        return b.prototype._resetLayout = function() {
            this.y = 0
        }, b.prototype._getItemLayoutPosition = function(a) {
            a.getSize();
            var b = (this.isotope.size.innerWidth - a.size.outerWidth) * this.options.horizontalAlignment,
                c = this.y;
            return this.y += a.size.outerHeight, {
                x: b,
                y: c
            }
        }, b.prototype._getContainerSize = function() {
            return {
                height: this.y
            }
        }, b
    }
    "function" == typeof define && define.amd ? define("isotope/js/layout-modes/vertical", ["../layout-mode"], b) : b(a.Isotope.LayoutMode)
}(window),
function(a) {
    function b(a, b) {
        for (var c in b) a[c] = b[c];
        return a
    }

    function c(a) {
        return "[object Array]" === k.call(a)
    }

    function d(a) {
        var b = [];
        if (c(a)) b = a;
        else if (a && "number" == typeof a.length)
            for (var d = 0, e = a.length; e > d; d++) b.push(a[d]);
        else b.push(a);
        return b
    }

    function e(a, b) {
        var c = l(b, a); - 1 !== c && b.splice(c, 1)
    }

    function f(a, c, f, i, k) {
        function l(a, b) {
            return function(c, d) {
                for (var e = 0, f = a.length; f > e; e++) {
                    var g = a[e],
                        h = c.sortData[g],
                        i = d.sortData[g];
                    if (h > i || i > h) {
                        var j = void 0 !== b[g] ? b[g] : b,
                            k = j ? 1 : -1;
                        return (h > i ? 1 : -1) * k
                    }
                }
                return 0
            }
        }
        var m = a.create("isotope", {
            layoutMode: "masonry",
            isJQueryFiltering: !0,
            sortAscending: !0
        });
        m.Item = i, m.LayoutMode = k, m.prototype._create = function() {
            this.itemGUID = 0, this._sorters = {}, this._getSorters(), a.prototype._create.call(this), this.modes = {}, this.filteredItems = this.items, this.sortHistory = ["original-order"];
            for (var b in k.modes) this._initLayoutMode(b)
        }, m.prototype.reloadItems = function() {
            this.itemGUID = 0, a.prototype.reloadItems.call(this)
        }, m.prototype._itemize = function() {
            for (var b = a.prototype._itemize.apply(this, arguments), c = 0, d = b.length; d > c; c++) {
                var e = b[c];
                e.id = this.itemGUID++
            }
            return this._updateItemsSortData(b), b
        }, m.prototype._initLayoutMode = function(a) {
            var c = k.modes[a],
                d = this.options[a] || {};
            this.options[a] = c.options ? b(c.options, d) : d, this.modes[a] = new c(this)
        }, m.prototype.layout = function() {
            return !this._isLayoutInited && this.options.isInitLayout ? void this.arrange() : void this._layout()
        }, m.prototype._layout = function() {
            var a = this._getIsInstant();
            this._resetLayout(), this._manageStamps(), this.layoutItems(this.filteredItems, a), this._isLayoutInited = !0
        }, m.prototype.arrange = function(a) {
            this.option(a), this._getIsInstant(), this.filteredItems = this._filter(this.items), this._sort(), this._layout()
        }, m.prototype._init = m.prototype.arrange, m.prototype._getIsInstant = function() {
            var a = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
            return this._isInstant = a, a
        }, m.prototype._filter = function(a) {
            function b() {
                l.reveal(e), l.hide(f)
            }
            var c = this.options.filter;
            c = c || "*";
            for (var d = [], e = [], f = [], g = this._getFilterTest(c), h = 0, i = a.length; i > h; h++) {
                var j = a[h];
                if (!j.isIgnored) {
                    var k = g(j);
                    k && d.push(j), k && j.isHidden ? e.push(j) : k || j.isHidden || f.push(j)
                }
            }
            var l = this;
            return this._isInstant ? this._noTransition(b) : b(), d
        }, m.prototype._getFilterTest = function(a) {
            return g && this.options.isJQueryFiltering ? function(b) {
                return g(b.element).is(a)
            } : "function" == typeof a ? function(b) {
                return a(b.element)
            } : function(b) {
                return f(b.element, a)
            }
        }, m.prototype.updateSortData = function(a) {
            this._getSorters(), a = d(a);
            var b = this.getItems(a);
            b = b.length ? b : this.items, this._updateItemsSortData(b)
        }, m.prototype._getSorters = function() {
            var a = this.options.getSortData;
            for (var b in a) {
                var c = a[b];
                this._sorters[b] = n(c)
            }
        }, m.prototype._updateItemsSortData = function(a) {
            for (var b = 0, c = a.length; c > b; b++) {
                var d = a[b];
                d.updateSortData()
            }
        };
        var n = function() {
            function a(a) {
                if ("string" != typeof a) return a;
                var c = h(a).split(" "),
                    d = c[0],
                    e = d.match(/^\[(.+)\]$/),
                    f = e && e[1],
                    g = b(f, d),
                    i = m.sortDataParsers[c[1]];
                return a = i ? function(a) {
                    return a && i(g(a))
                } : function(a) {
                    return a && g(a)
                }
            }

            function b(a, b) {
                var c;
                return c = a ? function(b) {
                    return b.getAttribute(a)
                } : function(a) {
                    var c = a.querySelector(b);
                    return c && j(c)
                }
            }
            return a
        }();
        m.sortDataParsers = {
            parseInt: function(a) {
                return parseInt(a, 10)
            },
            parseFloat: function(a) {
                return parseFloat(a)
            }
        }, m.prototype._sort = function() {
            var a = this.options.sortBy;
            if (a) {
                var b = [].concat.apply(a, this.sortHistory),
                    c = l(b, this.options.sortAscending);
                this.filteredItems.sort(c), a !== this.sortHistory[0] && this.sortHistory.unshift(a)
            }
        }, m.prototype._mode = function() {
            var a = this.options.layoutMode,
                b = this.modes[a];
            if (!b) throw new Error("No layout mode: " + a);
            return b.options = this.options[a], b
        }, m.prototype._resetLayout = function() {
            a.prototype._resetLayout.call(this), this._mode()._resetLayout()
        }, m.prototype._getItemLayoutPosition = function(a) {
            return this._mode()._getItemLayoutPosition(a)
        }, m.prototype._manageStamp = function(a) {
            this._mode()._manageStamp(a)
        }, m.prototype._getContainerSize = function() {
            return this._mode()._getContainerSize()
        }, m.prototype.needsResizeLayout = function() {
            return this._mode().needsResizeLayout()
        }, m.prototype.appended = function(a) {
            var b = this.addItems(a);
            if (b.length) {
                var c = this._filterRevealAdded(b);
                this.filteredItems = this.filteredItems.concat(c)
            }
        }, m.prototype.prepended = function(a) {
            var b = this._itemize(a);
            if (b.length) {
                var c = this.items.slice(0);
                this.items = b.concat(c), this._resetLayout(), this._manageStamps();
                var d = this._filterRevealAdded(b);
                this.layoutItems(c), this.filteredItems = d.concat(this.filteredItems)
            }
        }, m.prototype._filterRevealAdded = function(a) {
            var b = this._noTransition(function() {
                return this._filter(a)
            });
            return this.layoutItems(b, !0), this.reveal(b), a
        }, m.prototype.insert = function(a) {
            var b = this.addItems(a);
            if (b.length) {
                var c, d, e = b.length;
                for (c = 0; e > c; c++) d = b[c], this.element.appendChild(d.element);
                var f = this._filter(b);
                for (this._noTransition(function() {
                    this.hide(f)
                }), c = 0; e > c; c++) b[c].isLayoutInstant = !0;
                for (this.arrange(), c = 0; e > c; c++) delete b[c].isLayoutInstant;
                this.reveal(f)
            }
        };
        var o = m.prototype.remove;
        return m.prototype.remove = function(a) {
            a = d(a);
            var b = this.getItems(a);
            if (o.call(this, a), b && b.length)
                for (var c = 0, f = b.length; f > c; c++) {
                    var g = b[c];
                    e(g, this.filteredItems)
                }
        }, m.prototype.shuffle = function() {
            for (var a = 0, b = this.items.length; b > a; a++) {
                var c = this.items[a];
                c.sortData.random = Math.random()
            }
            this.options.sortBy = "random", this._sort(), this._layout()
        }, m.prototype._noTransition = function(a) {
            var b = this.options.transitionDuration;
            this.options.transitionDuration = 0;
            var c = a.call(this);
            return this.options.transitionDuration = b, c
        }, m.prototype.getFilteredItemElements = function() {
            for (var a = [], b = 0, c = this.filteredItems.length; c > b; b++) a.push(this.filteredItems[b].element);
            return a
        }, m
    }
    var g = a.jQuery,
        h = String.prototype.trim ? function(a) {
            return a.trim()
        } : function(a) {
            return a.replace(/^\s+|\s+$/g, "")
        }, i = document.documentElement,
        j = i.textContent ? function(a) {
            return a.textContent
        } : function(a) {
            return a.innerText
        }, k = Object.prototype.toString,
        l = Array.prototype.indexOf ? function(a, b) {
            return a.indexOf(b)
        } : function(a, b) {
            for (var c = 0, d = a.length; d > c; c++)
                if (a[c] === b) return c;
            return -1
        };
    "function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size", "matches-selector/matches-selector", "isotope/js/item", "isotope/js/layout-mode", "isotope/js/layout-modes/masonry", "isotope/js/layout-modes/fit-rows", "isotope/js/layout-modes/vertical"], f) : a.Isotope = f(a.Outlayer, a.getSize, a.matchesSelector, a.Isotope.Item, a.Isotope.LayoutMode)
}(window), + function(a) {
    "use strict";

    function b(b) {
        b && 3 === b.which || (a(e).remove(), a(f).each(function() {
            var d = a(this),
                e = c(d),
                f = {
                    relatedTarget: this
                };
            e.hasClass("open") && (e.trigger(b = a.Event("hide.bs.dropdown", f)), b.isDefaultPrevented() || (d.attr("aria-expanded", "false"), e.removeClass("open").trigger("hidden.bs.dropdown", f)))
        }))
    }

    function c(b) {
        var c = b.attr("data-target");
        c || (c = b.attr("href"), c = c && /#[A-Za-z]/.test(c) && c.replace(/.*(?=#[^\s]*$)/, ""));
        var d = c && a(c);
        return d && d.length ? d : b.parent()
    }

    function d(b) {
        return this.each(function() {
            var c = a(this),
                d = c.data("bs.dropdown");
            d || c.data("bs.dropdown", d = new g(this)), "string" == typeof b && d[b].call(c)
        })
    }
    var e = ".dropdown-backdrop",
        f = '[data-toggle="dropdown"]',
        g = function(b) {
            a(b).on("click.bs.dropdown", this.toggle)
        };
    g.VERSION = "3.2.0", g.prototype.toggle = function(d) {
        var e = a(this);
        if (!e.is(".disabled, :disabled")) {
            var f = c(e),
                g = f.hasClass("open");
            if (b(), !g) {
                "ontouchstart" in document.documentElement && !f.closest(".navbar-nav").length && a('<div class="dropdown-backdrop"/>').insertAfter(a(this)).on("click", b);
                var h = {
                    relatedTarget: this
                };
                if (f.trigger(d = a.Event("show.bs.dropdown", h)), d.isDefaultPrevented()) return;
                e.trigger("focus").attr("aria-expanded", "true"), f.toggleClass("open").trigger("shown.bs.dropdown", h)
            }
            return !1
        }
    }, g.prototype.keydown = function(b) {
        if (/(38|40|27)/.test(b.keyCode)) {
            var d = a(this);
            if (b.preventDefault(), b.stopPropagation(), !d.is(".disabled, :disabled")) {
                var e = c(d),
                    g = e.hasClass("open");
                if (!g || g && 27 == b.keyCode) return 27 == b.which && e.find(f).trigger("focus"), d.trigger("click");
                var h = " li:not(.divider):visible a",
                    i = e.find('[role="menu"]' + h + ', [role="listbox"]' + h);
                if (i.length) {
                    var j = i.index(i.filter(":focus"));
                    38 == b.keyCode && j > 0 && j--, 40 == b.keyCode && j < i.length - 1 && j++, ~j || (j = 0), i.eq(j).trigger("focus")
                }
            }
        }
    };
    var h = a.fn.dropdown;
    a.fn.dropdown = d, a.fn.dropdown.Constructor = g, a.fn.dropdown.noConflict = function() {
        return a.fn.dropdown = h, this
    }, a(document).on("click.bs.dropdown.data-api", b).on("click.bs.dropdown.data-api", ".dropdown form", function(a) {
        a.stopPropagation()
    }).on("click.bs.dropdown.data-api", f, g.prototype.toggle).on("keydown.bs.dropdown.data-api", f + ', [role="menu"], [role="listbox"]', g.prototype.keydown)
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.tooltip"),
                f = "object" == typeof b && b;
            (e || "destroy" != b) && (e || d.data("bs.tooltip", e = new c(this, f)), "string" == typeof b && e[b]())
        })
    }
    var c = function(a, b) {
        this.type = this.options = this.enabled = this.timeout = this.hoverState = this.$element = null, this.init("tooltip", a, b)
    };
    c.VERSION = "3.2.0", c.DEFAULTS = {
        animation: !0,
        placement: "top",
        selector: !1,
        template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
        trigger: "hover focus",
        title: "",
        delay: 0,
        html: !1,
        container: !1,
        viewport: {
            selector: "body",
            padding: 0
        }
    }, c.prototype.init = function(b, c, d) {
        this.enabled = !0, this.type = b, this.$element = a(c), this.options = this.getOptions(d), this.$viewport = this.options.viewport && a(this.options.viewport.selector || this.options.viewport);
        for (var e = this.options.trigger.split(" "), f = e.length; f--;) {
            var g = e[f];
            if ("click" == g) this.$element.on("click." + this.type, this.options.selector, a.proxy(this.toggle, this));
            else if ("manual" != g) {
                var h = "hover" == g ? "mouseenter" : "focusin",
                    i = "hover" == g ? "mouseleave" : "focusout";
                this.$element.on(h + "." + this.type, this.options.selector, a.proxy(this.enter, this)), this.$element.on(i + "." + this.type, this.options.selector, a.proxy(this.leave, this))
            }
        }
        this.options.selector ? this._options = a.extend({}, this.options, {
            trigger: "manual",
            selector: ""
        }) : this.fixTitle()
    }, c.prototype.getDefaults = function() {
        return c.DEFAULTS
    }, c.prototype.getOptions = function(b) {
        return b = a.extend({}, this.getDefaults(), this.$element.data(), b), b.delay && "number" == typeof b.delay && (b.delay = {
            show: b.delay,
            hide: b.delay
        }), b
    }, c.prototype.getDelegateOptions = function() {
        var b = {}, c = this.getDefaults();
        return this._options && a.each(this._options, function(a, d) {
            c[a] != d && (b[a] = d)
        }), b
    }, c.prototype.enter = function(b) {
        var c = b instanceof this.constructor ? b : a(b.currentTarget).data("bs." + this.type);
        return c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c)), clearTimeout(c.timeout), c.hoverState = "in", c.options.delay && c.options.delay.show ? void(c.timeout = setTimeout(function() {
            "in" == c.hoverState && c.show()
        }, c.options.delay.show)) : c.show()
    }, c.prototype.leave = function(b) {
        var c = b instanceof this.constructor ? b : a(b.currentTarget).data("bs." + this.type);
        return c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c)), clearTimeout(c.timeout), c.hoverState = "out", c.options.delay && c.options.delay.hide ? void(c.timeout = setTimeout(function() {
            "out" == c.hoverState && c.hide()
        }, c.options.delay.hide)) : c.hide()
    }, c.prototype.show = function() {
        var b = a.Event("show.bs." + this.type);
        if (this.hasContent() && this.enabled) {
            this.$element.trigger(b);
            var c = a.contains(document.documentElement, this.$element[0]);
            if (b.isDefaultPrevented() || !c) return;
            var d = this,
                e = this.tip(),
                f = this.getUID(this.type);
            this.setContent(), e.attr("id", f), this.$element.attr("aria-describedby", f), this.options.animation && e.addClass("fade");
            var g = "function" == typeof this.options.placement ? this.options.placement.call(this, e[0], this.$element[0]) : this.options.placement,
                h = /\s?auto?\s?/i,
                i = h.test(g);
            i && (g = g.replace(h, "") || "top"), e.detach().css({
                top: 0,
                left: 0,
                display: "block"
            }).addClass(g).data("bs." + this.type, this), this.options.container ? e.appendTo(this.options.container) : e.insertAfter(this.$element);
            var j = this.getPosition(),
                k = e[0].offsetWidth,
                l = e[0].offsetHeight;
            if (i) {
                var m = g,
                    n = this.$element.parent(),
                    o = this.getPosition(n);
                g = "bottom" == g && j.top + j.height + l - o.scroll > o.height ? "top" : "top" == g && j.top - o.scroll - l < 0 ? "bottom" : "right" == g && j.right + k > o.width ? "left" : "left" == g && j.left - k < o.left ? "right" : g, e.removeClass(m).addClass(g)
            }
            var p = this.getCalculatedOffset(g, j, k, l);
            this.applyPlacement(p, g);
            var q = function() {
                d.$element.trigger("shown.bs." + d.type), d.hoverState = null
            };
            a.support.transition && this.$tip.hasClass("fade") ? e.one("bsTransitionEnd", q).emulateTransitionEnd(150) : q()
        }
    }, c.prototype.applyPlacement = function(b, c) {
        var d = this.tip(),
            e = d[0].offsetWidth,
            f = d[0].offsetHeight,
            g = parseInt(d.css("margin-top"), 10),
            h = parseInt(d.css("margin-left"), 10);
        isNaN(g) && (g = 0), isNaN(h) && (h = 0), b.top = b.top + g, b.left = b.left + h, a.offset.setOffset(d[0], a.extend({
            using: function(a) {
                d.css({
                    top: Math.round(a.top),
                    left: Math.round(a.left)
                })
            }
        }, b), 0), d.addClass("in");
        var i = d[0].offsetWidth,
            j = d[0].offsetHeight;
        "top" == c && j != f && (b.top = b.top + f - j);
        var k = this.getViewportAdjustedDelta(c, b, i, j);
        k.left ? b.left += k.left : b.top += k.top;
        var l = k.left ? 2 * k.left - e + i : 2 * k.top - f + j,
            m = k.left ? "left" : "top",
            n = k.left ? "offsetWidth" : "offsetHeight";
        d.offset(b), this.replaceArrow(l, d[0][n], m)
    }, c.prototype.replaceArrow = function(a, b, c) {
        this.arrow().css(c, a ? 50 * (1 - a / b) + "%" : "")
    }, c.prototype.setContent = function() {
        var a = this.tip(),
            b = this.getTitle();
        a.find(".tooltip-inner")[this.options.html ? "html" : "text"](b), a.removeClass("fade in top bottom left right")
    }, c.prototype.hide = function() {
        function b() {
            "in" != c.hoverState && d.detach(), c.$element.trigger("hidden.bs." + c.type)
        }
        var c = this,
            d = this.tip(),
            e = a.Event("hide.bs." + this.type);
        return this.$element.removeAttr("aria-describedby"), this.$element.trigger(e), e.isDefaultPrevented() ? void 0 : (d.removeClass("in"), a.support.transition && this.$tip.hasClass("fade") ? d.one("bsTransitionEnd", b).emulateTransitionEnd(150) : b(), this.hoverState = null, this)
    }, c.prototype.fixTitle = function() {
        var a = this.$element;
        (a.attr("title") || "string" != typeof a.attr("data-original-title")) && a.attr("data-original-title", a.attr("title") || "").attr("title", "")
    }, c.prototype.hasContent = function() {
        return this.getTitle()
    }, c.prototype.getPosition = function(b) {
        b = b || this.$element;
        var c = b[0],
            d = "BODY" == c.tagName,
            e = window.SVGElement && c instanceof window.SVGElement,
            f = c.getBoundingClientRect ? c.getBoundingClientRect() : null,
            g = d ? {
                top: 0,
                left: 0
            } : b.offset(),
            h = {
                scroll: d ? document.documentElement.scrollTop || document.body.scrollTop : b.scrollTop()
            }, i = e ? {} : {
                width: d ? a(window).width() : b.outerWidth(),
                height: d ? a(window).height() : b.outerHeight()
            };
        return a.extend({}, f, h, i, g)
    }, c.prototype.getCalculatedOffset = function(a, b, c, d) {
        return "bottom" == a ? {
            top: b.top + b.height,
            left: b.left + b.width / 2 - c / 2
        } : "top" == a ? {
            top: b.top - d,
            left: b.left + b.width / 2 - c / 2
        } : "left" == a ? {
            top: b.top + b.height / 2 - d / 2,
            left: b.left - c
        } : {
            top: b.top + b.height / 2 - d / 2,
            left: b.left + b.width
        }
    }, c.prototype.getViewportAdjustedDelta = function(a, b, c, d) {
        var e = {
            top: 0,
            left: 0
        };
        if (!this.$viewport) return e;
        var f = this.options.viewport && this.options.viewport.padding || 0,
            g = this.getPosition(this.$viewport);
        if (/right|left/.test(a)) {
            var h = b.top - f - g.scroll,
                i = b.top + f - g.scroll + d;
            h < g.top ? e.top = g.top - h : i > g.top + g.height && (e.top = g.top + g.height - i)
        } else {
            var j = b.left - f,
                k = b.left + f + c;
            j < g.left ? e.left = g.left - j : k > g.width && (e.left = g.left + g.width - k)
        }
        return e
    }, c.prototype.getTitle = function() {
        var a, b = this.$element,
            c = this.options;
        return a = b.attr("data-original-title") || ("function" == typeof c.title ? c.title.call(b[0]) : c.title)
    }, c.prototype.getUID = function(a) {
        do a += ~~(1e6 * Math.random()); while (document.getElementById(a));
        return a
    }, c.prototype.tip = function() {
        return this.$tip = this.$tip || a(this.options.template)
    }, c.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    }, c.prototype.validate = function() {
        this.$element[0].parentNode || (this.hide(), this.$element = null, this.options = null)
    }, c.prototype.enable = function() {
        this.enabled = !0
    }, c.prototype.disable = function() {
        this.enabled = !1
    }, c.prototype.toggleEnabled = function() {
        this.enabled = !this.enabled
    }, c.prototype.toggle = function(b) {
        var c = this;
        b && (c = a(b.currentTarget).data("bs." + this.type), c || (c = new this.constructor(b.currentTarget, this.getDelegateOptions()), a(b.currentTarget).data("bs." + this.type, c))), c.tip().hasClass("in") ? c.leave(c) : c.enter(c)
    }, c.prototype.destroy = function() {
        clearTimeout(this.timeout), this.hide().$element.off("." + this.type).removeData("bs." + this.type)
    };
    var d = a.fn.tooltip;
    a.fn.tooltip = b, a.fn.tooltip.Constructor = c, a.fn.tooltip.noConflict = function() {
        return a.fn.tooltip = d, this
    }
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.popover"),
                f = "object" == typeof b && b;
            (e || "destroy" != b) && (e || d.data("bs.popover", e = new c(this, f)), "string" == typeof b && e[b]())
        })
    }
    var c = function(a, b) {
        this.init("popover", a, b)
    };
    if (!a.fn.tooltip) throw new Error("Popover requires tooltip.js");
    c.VERSION = "3.2.0", c.DEFAULTS = a.extend({}, a.fn.tooltip.Constructor.DEFAULTS, {
        placement: "right",
        trigger: "click",
        content: "",
        template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
    }), c.prototype = a.extend({}, a.fn.tooltip.Constructor.prototype), c.prototype.constructor = c, c.prototype.getDefaults = function() {
        return c.DEFAULTS
    }, c.prototype.setContent = function() {
        var a = this.tip(),
            b = this.getTitle(),
            c = this.getContent();
        a.find(".popover-title")[this.options.html ? "html" : "text"](b), a.find(".popover-content").empty()[this.options.html ? "string" == typeof c ? "html" : "append" : "text"](c), a.removeClass("fade top bottom left right in"), a.find(".popover-title").html() || a.find(".popover-title").hide()
    }, c.prototype.hasContent = function() {
        return this.getTitle() || this.getContent()
    }, c.prototype.getContent = function() {
        var a = this.$element,
            b = this.options;
        return a.attr("data-content") || ("function" == typeof b.content ? b.content.call(a[0]) : b.content)
    }, c.prototype.arrow = function() {
        return this.$arrow = this.$arrow || this.tip().find(".arrow")
    }, c.prototype.tip = function() {
        return this.$tip || (this.$tip = a(this.options.template)), this.$tip
    };
    var d = a.fn.popover;
    a.fn.popover = b, a.fn.popover.Constructor = c, a.fn.popover.noConflict = function() {
        return a.fn.popover = d, this
    }
}(jQuery), $(document).on("ready", function() {
    $(".progressbar").each(function() {
        var a = $(this),
            b = $(this).attr("data-value");
        progress(b, a)
    })
}), $(function() {
    $("#header-right, .updateEasyPieChart, .complete-user-profile, #progress-dropdown, .progress-box").hover(function() {
        $(".progressbar").each(function() {
            var a = $(this),
                b = $(this).attr("data-value");
            progress(b, a)
        })
    })
}), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.button"),
                f = "object" == typeof b && b;
            e || d.data("bs.button", e = new c(this, f)), "toggle" == b ? e.toggle() : b && e.setState(b)
        })
    }
    var c = function(b, d) {
        this.$element = a(b), this.options = a.extend({}, c.DEFAULTS, d), this.isLoading = !1
    };
    c.VERSION = "3.2.0", c.DEFAULTS = {
        loadingText: "loading..."
    }, c.prototype.setState = function(b) {
        var c = "disabled",
            d = this.$element,
            e = d.is("input") ? "val" : "html",
            f = d.data();
        b += "Text", null == f.resetText && d.data("resetText", d[e]()), d[e](null == f[b] ? this.options[b] : f[b]), setTimeout(a.proxy(function() {
            "loadingText" == b ? (this.isLoading = !0, d.addClass(c).attr(c, c)) : this.isLoading && (this.isLoading = !1, d.removeClass(c).removeAttr(c))
        }, this), 0)
    }, c.prototype.toggle = function() {
        var a = !0,
            b = this.$element.closest('[data-toggle="buttons"]');
        if (b.length) {
            var c = this.$element.find("input");
            "radio" == c.prop("type") && (c.prop("checked") && this.$element.hasClass("active") ? a = !1 : b.find(".active").removeClass("active")), a && c.prop("checked", !this.$element.hasClass("active")).trigger("change")
        }
        a && this.$element.toggleClass("active")
    };
    var d = a.fn.button;
    a.fn.button = b, a.fn.button.Constructor = c, a.fn.button.noConflict = function() {
        return a.fn.button = d, this
    }, a(document).on("click.bs.button.data-api", '[data-toggle^="button"]', function(c) {
        var d = a(c.target);
        d.hasClass("btn") || (d = d.closest(".btn")), b.call(d, "toggle"), c.preventDefault()
    }).on("focus.bs.button.data-api blur.bs.button.data-api", '[data-toggle^="button"]', function(b) {
        a(b.target).closest(".btn").toggleClass("focus", "focus" == b.type)
    })
}(jQuery), + function(a) {
    "use strict";

    function b(b) {
        return this.each(function() {
            var d = a(this),
                e = d.data("bs.collapse"),
                f = a.extend({}, c.DEFAULTS, d.data(), "object" == typeof b && b);
            !e && f.toggle && "show" == b && (b = !b), e || d.data("bs.collapse", e = new c(this, f)), "string" == typeof b && e[b]()
        })
    }
    var c = function(b, d) {
        this.$element = a(b), this.options = a.extend({}, c.DEFAULTS, d), this.transitioning = null, this.options.parent && (this.$parent = a(this.options.parent)), this.options.toggle && this.toggle()
    };
    c.VERSION = "3.2.0", c.DEFAULTS = {
        toggle: !0
    }, c.prototype.dimension = function() {
        var a = this.$element.hasClass("width");
        return a ? "width" : "height"
    }, c.prototype.show = function() {
        if (!this.transitioning && !this.$element.hasClass("in")) {
            var c = a.Event("show.bs.collapse");
            if (this.$element.trigger(c), !c.isDefaultPrevented()) {
                var d = this.$parent && this.$parent.find("> .panel > .in");
                if (d && d.length) {
                    var e = d.data("bs.collapse");
                    if (e && e.transitioning) return;
                    b.call(d, "hide"), e || d.data("bs.collapse", null)
                }
                var f = this.dimension();
                this.$element.removeClass("collapse").addClass("collapsing")[f](0), this.transitioning = 1;
                var g = function() {
                    this.$element.removeClass("collapsing").addClass("collapse in")[f](""), this.transitioning = 0, this.$element.trigger("shown.bs.collapse")
                };
                if (!a.support.transition) return g.call(this);
                var h = a.camelCase(["scroll", f].join("-"));
                this.$element.one("bsTransitionEnd", a.proxy(g, this)).emulateTransitionEnd(350)[f](this.$element[0][h])
            }
        }
    }, c.prototype.hide = function() {
        if (!this.transitioning && this.$element.hasClass("in")) {
            var b = a.Event("hide.bs.collapse");
            if (this.$element.trigger(b), !b.isDefaultPrevented()) {
                var c = this.dimension();
                this.$element[c](this.$element[c]())[0].offsetHeight, this.$element.addClass("collapsing").removeClass("collapse in"), this.transitioning = 1;
                var d = function() {
                    this.transitioning = 0, this.$element.trigger("hidden.bs.collapse").removeClass("collapsing").addClass("collapse")
                };
                return a.support.transition ? void this.$element[c](0).one("bsTransitionEnd", a.proxy(d, this)).emulateTransitionEnd(350) : d.call(this)
            }
        }
    }, c.prototype.toggle = function() {
        this[this.$element.hasClass("in") ? "hide" : "show"]()
    };
    var d = a.fn.collapse;
    a.fn.collapse = b, a.fn.collapse.Constructor = c, a.fn.collapse.noConflict = function() {
        return a.fn.collapse = d, this
    }, a(document).on("click.bs.collapse.data-api", '[data-toggle="collapse"]', function(c) {
        var d, e = a(this),
            f = e.attr("data-target") || c.preventDefault() || (d = e.attr("href")) && d.replace(/.*(?=#[^\s]+$)/, ""),
            g = a(f),
            h = g.data("bs.collapse"),
            i = h ? "toggle" : e.data(),
            j = e.attr("data-parent"),
            k = j && a(j);
        h && h.transitioning || (k && k.find('[data-toggle="collapse"][data-parent="' + j + '"]').not(e).addClass("collapsed"), e.toggleClass("collapsed", g.hasClass("in"))), b.call(g, i)
    })
}(jQuery),
function(a) {
    var b = function() {
        var b = {
            bcClass: "sf-breadcrumb",
            menuClass: "sf-js-enabled",
            anchorClass: "sf-with-ul",
            menuArrowClass: "sf-arrows"
        }, c = (function() {
                a(window).load(function() {
                    a("body").children().on("click.superclick", function() {
                        var b = a(".sf-js-enabled");
                        b.superclick("reset")
                    })
                })
            }(), function(a, c) {
                var d = b.menuClass;
                c.cssArrows && (d += " " + b.menuArrowClass), a.toggleClass(d)
            }),
            d = function(c, d) {
                return c.find("li." + d.pathClass).slice(0, d.pathLevels).addClass(d.activeClass + " " + b.bcClass).filter(function() {
                    return a(this).children(".sidebar-submenu").hide().show().length
                }).removeClass(d.pathClass)
            }, e = function(a) {
                a.children("a").toggleClass(b.anchorClass)
            }, f = function(a) {
                var b = a.css("ms-touch-action");
                b = "pan-y" === b ? "auto" : "pan-y", a.css("ms-touch-action", b)
            }, g = function() {
                var b, c = a(this),
                    d = c.siblings(".sidebar-submenu");
                return d.length ? (b = d.is(":hidden") ? h : i, a.proxy(b, c.parent("li"))(), !1) : void 0
            }, h = function() {
                {
                    var b = a(this);
                    l(b)
                }
                b.siblings().superclick("hide").end().superclick("show")
            }, i = function() {
                var b = a(this),
                    c = l(b);
                a.proxy(j, b, c)()
            }, j = function(b) {
                b.retainPath = a.inArray(this[0], b.$path) > -1, this.superclick("hide"), this.parents("." + b.activeClass).length || (b.onIdle.call(k(this)), b.$path.length && a.proxy(h, b.$path)())
            }, k = function(a) {
                return a.closest("." + b.menuClass)
            }, l = function(a) {
                return k(a).data("sf-options")
            };
        return {
            hide: function(b) {
                if (this.length) {
                    var c = this,
                        d = l(c);
                    if (!d) return this;
                    var e = d.retainPath === !0 ? d.$path : "",
                        f = c.find("li." + d.activeClass).add(this).not(e).removeClass(d.activeClass).children(".sidebar-submenu"),
                        g = d.speedOut;
                    b && (f.show(), g = 0), d.retainPath = !1, d.onBeforeHide.call(f), f.stop(!0, !0).animate(d.animationOut, g, function() {
                        var b = a(this);
                        d.onHide.call(b)
                    })
                }
                return this
            },
            show: function() {
                var a = l(this);
                if (!a) return this;
                var b = this.addClass(a.activeClass),
                    c = b.children(".sidebar-submenu");
                return a.onBeforeShow.call(c), c.stop(!0, !0).animate(a.animation, a.speed, function() {
                    a.onShow.call(c)
                }), this
            },
            destroy: function() {
                return this.each(function() {
                    var d = a(this),
                        g = d.data("sf-options"),
                        h = d.find("li:has(ul)");
                    return g ? (c(d, g), e(h), f(d), d.off(".superclick"), h.children(".sidebar-submenu").attr("style", function(a, b) {
                        return b.replace(/display[^;]+;?/g, "")
                    }), g.$path.removeClass(g.activeClass + " " + b.bcClass).addClass(g.pathClass), d.find("." + g.activeClass).removeClass(g.activeClass), g.onDestroy.call(d), void d.removeData("sf-options")) : !1
                })
            },
            reset: function() {
                return this.each(function() {
                    var b = a(this),
                        c = l(b),
                        d = a(b.find("." + c.activeClass).toArray().reverse());
                    d.children("a").trigger("click")
                })
            },
            init: function(h) {
                return this.each(function() {
                    var i = a(this);
                    if (i.data("sf-options")) return !1;
                    var j = a.extend({}, a.fn.superclick.defaults, h),
                        k = i.find("li:has(ul)");
                    j.$path = d(i, j), i.data("sf-options", j), c(i, j), e(k), f(i), i.on("click.superclick", "a", g), k.not("." + b.bcClass).superclick("hide", !0), j.onInit.call(this)
                })
            }
        }
    }();
    a.fn.superclick = function(c) {
        return b[c] ? b[c].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof c && c ? a.error("Method " + c + " does not exist on jQuery.fn.superclick") : b.init.apply(this, arguments)
    }, a.fn.superclick.defaults = {
        activeClass: "sfHover",
        pathClass: "overrideThisToUse",
        pathLevels: 1,
        animation: {
            opacity: "show"
        },
        animationOut: {
            opacity: "hide"
        },
        speed: "normal",
        speedOut: "fast",
        cssArrows: !0,
        onInit: a.noop,
        onBeforeShow: a.noop,
        onShow: a.noop,
        onBeforeHide: a.noop,
        onHide: a.noop,
        onIdle: a.noop,
        onDestroy: a.noop
    }
}(jQuery),
function() {
    "use strict";
    var a = "undefined" != typeof module && module.exports,
        b = "undefined" != typeof Element && "ALLOW_KEYBOARD_INPUT" in Element,
        c = function() {
            for (var a, b, c = [
                    ["requestFullscreen", "exitFullscreen", "fullscreenElement", "fullscreenEnabled", "fullscreenchange", "fullscreenerror"],
                    ["webkitRequestFullscreen", "webkitExitFullscreen", "webkitFullscreenElement", "webkitFullscreenEnabled", "webkitfullscreenchange", "webkitfullscreenerror"],
                    ["webkitRequestFullScreen", "webkitCancelFullScreen", "webkitCurrentFullScreenElement", "webkitCancelFullScreen", "webkitfullscreenchange", "webkitfullscreenerror"],
                    ["mozRequestFullScreen", "mozCancelFullScreen", "mozFullScreenElement", "mozFullScreenEnabled", "mozfullscreenchange", "mozfullscreenerror"],
                    ["msRequestFullscreen", "msExitFullscreen", "msFullscreenElement", "msFullscreenEnabled", "MSFullscreenChange", "MSFullscreenError"]
                ], d = 0, e = c.length, f = {}; e > d; d++)
                if (a = c[d], a && a[1] in document) {
                    for (d = 0, b = a.length; b > d; d++) f[c[0][d]] = a[d];
                    return f
                }
            return !1
        }(),
        d = {
            request: function(a) {
                var d = c.requestFullscreen;
                a = a || document.documentElement, /5\.1[\.\d]* Safari/.test(navigator.userAgent) ? a[d]() : a[d](b && Element.ALLOW_KEYBOARD_INPUT)
            },
            exit: function() {
                document[c.exitFullscreen]()
            },
            toggle: function(a) {
                this.isFullscreen ? this.exit() : this.request(a)
            },
            onchange: function() {},
            onerror: function() {},
            raw: c
        };
    return c ? (Object.defineProperties(d, {
        isFullscreen: {
            get: function() {
                return !!document[c.fullscreenElement]
            }
        },
        element: {
            enumerable: !0,
            get: function() {
                return document[c.fullscreenElement]
            }
        },
        enabled: {
            enumerable: !0,
            get: function() {
                return !!document[c.fullscreenEnabled]
            }
        }
    }), document.addEventListener(c.fullscreenchange, function(a) {
        d.onchange.call(d, a)
    }), document.addEventListener(c.fullscreenerror, function(a) {
        d.onerror.call(d, a)
    }), void(a ? module.exports = d : window.screenfull = d)) : void(a ? module.exports = !1 : window.screenfull = !1)
}(),
function(a) {
    a.fn.simpleCheckbox = function(b) {
        var c = {
            newElementClass: "switch-toggle",
            activeElementClass: "switch-on"
        }, b = a.extend(c, b);
        this.each(function() {
            var c = a(this),
                d = a("<div/>", {
                    id: "#" + c.attr("id"),
                    "class": b.newElementClass,
                    style: "display: block;"
                }).insertAfter(this);
            if (c.is(":checked") && d.addClass(b.activeElementClass), c.hide(), a("[for=" + c.attr("id") + "]").length) {
                var e = a("[for=" + c.attr("id") + "]");
                e.click(function() {
                    return d.trigger("click"), !1
                })
            }
            d.click(function() {
                var c = a(this);
                return c.hasClass(b.activeElementClass) ? (c.removeClass(b.activeElementClass), a(c.attr("id")).attr("checked", !1)) : (c.addClass(b.activeElementClass), a(c.attr("id")).attr("checked", !0)), !1
            })
        })
    }
}(jQuery),
function(a) {
    jQuery.fn.extend({
        slimScroll: function(b) {
            var c = {
                width: "auto",
                height: "250px",
                size: "7px",
                color: "#000",
                position: "right",
                distance: "1px",
                start: "top",
                opacity: .4,
                alwaysVisible: !1,
                disableFadeOut: !1,
                railVisible: !1,
                railColor: "#333",
                railOpacity: .2,
                railDraggable: !0,
                railClass: "slimScrollRail",
                barClass: "slimScrollBar",
                wrapperClass: "slimScrollDiv",
                allowPageScroll: !1,
                wheelStep: 20,
                touchScrollStep: 200,
                borderRadius: "7px",
                railBorderRadius: "7px"
            }, d = a.extend(c, b);
            return this.each(function() {
                function c(b) {
                    if (j) {
                        var b = b || window.event,
                            c = 0;
                        b.wheelDelta && (c = -b.wheelDelta / 120), b.detail && (c = b.detail / 3);
                        var f = b.target || b.srcTarget || b.srcElement;
                        a(f).closest("." + d.wrapperClass).is(v.parent()) && e(c, !0), b.preventDefault && !u && b.preventDefault(), u || (b.returnValue = !1)
                    }
                }

                function e(a, b, c) {
                    u = !1;
                    var e = a,
                        f = v.outerHeight() - A.outerHeight();
                    if (b && (e = parseInt(A.css("top")) + a * parseInt(d.wheelStep) / 100 * A.outerHeight(), e = Math.min(Math.max(e, 0), f), e = a > 0 ? Math.ceil(e) : Math.floor(e), A.css({
                        top: e + "px"
                    })), p = parseInt(A.css("top")) / (v.outerHeight() - A.outerHeight()), e = p * (v[0].scrollHeight - v.outerHeight()), c) {
                        e = a;
                        var g = e / v[0].scrollHeight * v.outerHeight();
                        g = Math.min(Math.max(g, 0), f), A.css({
                            top: g + "px"
                        })
                    }
                    v.scrollTop(e), v.trigger("slimscrolling", ~~e), h(), i()
                }

                function f() {
                    window.addEventListener ? (this.addEventListener("DOMMouseScroll", c, !1), this.addEventListener("mousewheel", c, !1), this.addEventListener("MozMousePixelScroll", c, !1)) : document.attachEvent("onmousewheel", c)
                }

                function g() {
                    o = Math.max(v.outerHeight() / v[0].scrollHeight * v.outerHeight(), s), A.css({
                        height: o + "px"
                    });
                    var a = o == v.outerHeight() ? "none" : "block";
                    A.css({
                        display: a
                    })
                }

                function h() {
                    if (g(), clearTimeout(m), p == ~~p) {
                        if (u = d.allowPageScroll, q != p) {
                            var a = 0 == ~~p ? "top" : "bottom";
                            v.trigger("slimscroll", a)
                        }
                    } else u = !1;
                    return q = p, o >= v.outerHeight() ? void(u = !0) : (A.stop(!0, !0).fadeIn("fast"), void(d.railVisible && z.stop(!0, !0).fadeIn("fast")))
                }

                function i() {
                    d.alwaysVisible || (m = setTimeout(function() {
                        d.disableFadeOut && j || k || l || (A.fadeOut("slow"), z.fadeOut("slow"))
                    }, 1e3))
                }
                var j, k, l, m, n, o, p, q, r = "<div></div>",
                    s = 30,
                    u = !1,
                    v = a(this);
                if (v.parent().hasClass(d.wrapperClass)) {
                    var w = v.scrollTop();
                    if (A = v.parent().find("." + d.barClass), z = v.parent().find("." + d.railClass), g(), a.isPlainObject(b)) {
                        if ("height" in b && "auto" == b.height) {
                            v.parent().css("height", "auto"), v.css("height", "auto");
                            var x = v.parent().parent().height();
                            v.parent().css("height", x), v.css("height", x)
                        }
                        if ("scrollTo" in b) w = parseInt(d.scrollTo);
                        else if ("scrollBy" in b) w += parseInt(d.scrollBy);
                        else if ("destroy" in b) return A.remove(), z.remove(), void v.unwrap();
                        e(w, !1, !0)
                    }
                } else {
                    d.height = "auto" == d.height ? v.parent().height() : d.height;
                    var y = a(r).addClass(d.wrapperClass).css({
                        position: "relative",
                        overflow: "hidden",
                        width: d.width,
                        height: d.height
                    });
                    v.css({
                        overflow: "hidden",
                        width: d.width,
                        height: d.height
                    });
                    var z = a(r).addClass(d.railClass).css({
                        width: d.size,
                        height: "100%",
                        position: "absolute",
                        top: 0,
                        display: d.alwaysVisible && d.railVisible ? "block" : "none",
                        "border-radius": d.railBorderRadius,
                        background: d.railColor,
                        opacity: d.railOpacity,
                        zIndex: 90
                    }),
                        A = a(r).addClass(d.barClass).css({
                            background: d.color,
                            width: d.size,
                            position: "absolute",
                            top: 0,
                            opacity: d.opacity,
                            display: d.alwaysVisible ? "block" : "none",
                            "border-radius": d.borderRadius,
                            BorderRadius: d.borderRadius,
                            MozBorderRadius: d.borderRadius,
                            WebkitBorderRadius: d.borderRadius,
                            zIndex: 99
                        }),
                        B = "right" == d.position ? {
                            right: d.distance
                        } : {
                            left: d.distance
                        };
                    z.css(B), A.css(B), v.wrap(y), v.parent().append(A), v.parent().append(z), d.railDraggable && A.bind("mousedown", function(b) {
                        var c = a(document);
                        return l = !0, t = parseFloat(A.css("top")), pageY = b.pageY, c.bind("mousemove.slimscroll", function(a) {
                            currTop = t + a.pageY - pageY, A.css("top", currTop), e(0, A.position().top, !1)
                        }), c.bind("mouseup.slimscroll", function() {
                            l = !1, i(), c.unbind(".slimscroll")
                        }), !1
                    }).bind("selectstart.slimscroll", function(a) {
                        return a.stopPropagation(), a.preventDefault(), !1
                    }), z.hover(function() {
                        h()
                    }, function() {
                        i()
                    }), A.hover(function() {
                        k = !0
                    }, function() {
                        k = !1
                    }), v.hover(function() {
                        j = !0, h(), i()
                    }, function() {
                        j = !1, i()
                    }), v.bind("touchstart", function(a) {
                        a.originalEvent.touches.length && (n = a.originalEvent.touches[0].pageY)
                    }), v.bind("touchmove", function(a) {
                        if (u || a.originalEvent.preventDefault(), a.originalEvent.touches.length) {
                            var b = (n - a.originalEvent.touches[0].pageY) / d.touchScrollStep;
                            e(b, !0), n = a.originalEvent.touches[0].pageY
                        }
                    }), g(), "bottom" === d.start ? (A.css({
                        top: v.outerHeight() - A.outerHeight()
                    }), e(0, !0)) : "top" !== d.start && (e(a(d.start).position().top, null, !0), d.alwaysVisible || A.hide()), f()
                }
            }), this
        }
    }), jQuery.fn.extend({
        slimscroll: jQuery.fn.slimScroll
    })
}(jQuery), $(document).ready(function() {
    $(".switch-button").click(function(a) {
        a.preventDefault();
        var b = $(this).attr("switch-parent"),
            c = $(this).attr("switch-target");
        $(b).slideToggle(), $(c).slideToggle()
    }), $(".hidden-button").hover(function() {
        $(".btn-hide", this).fadeIn("fast")
    }, function() {
        $(".btn-hide", this).fadeOut("normal")
    }), $(".toggle-button").click(function(a) {
        a.preventDefault(), $(".glyph-icon", this).toggleClass("icon-rotate-180"), $(this).parents(".content-box:first").find(".content-box-wrapper").slideToggle()
    }), $(".remove-button").click(function(a) {
        a.preventDefault();
        var b = $(this).attr("data-animation"),
            c = $(this).parents(".content-box:first");
        $(c).addClass("animated"), $(c).addClass(b);
        window.setTimeout(function() {
            $(c).slideUp()
        }, 500), window.setTimeout(function() {
            $(c).removeClass(b).fadeIn()
        }, 2500)
    }), $(function() {
        "use strict";
        $(".infobox-close").click(function(a) {
            a.preventDefault(), $(this).parent().fadeOut()
        })
    })
}), $(document).ready(function() {
    $(".overlay-button").click(function() {
        var a = $(this).attr("data-theme"),
            b = $(this).attr("data-opacity"),
            c = $(this).attr("data-style"),
            d = '<div id="loader-overlay" class="ui-front loader ui-widget-overlay ' + a + " opacity-" + b + '"><img src="../../assets/images/spinner/loader-' + c + '.gif" alt="" /></div>';
        $("#loader-overlay").length && $("#loader-overlay").remove(), $("body").append(d), $("#loader-overlay").fadeIn("fast"), setTimeout(function() {
            $("#loader-overlay").fadeOut("fast")
        }, 3e3)
    }), $(".refresh-button").click(function(a) {
        $(".glyph-icon", this).addClass("icon-spin"), a.preventDefault();
        var b = $(this).parents(".content-box"),
            c = $(this).attr("data-theme"),
            d = $(this).attr("data-opacity"),
            e = $(this).attr("data-style"),
            f = '<div id="refresh-overlay" class="ui-front loader ui-widget-overlay ' + c + " opacity-" + d + '"><img src="../../assets/images/spinner/loader-' + e + '.gif" alt="" /></div>';
        $("#refresh-overlay").length && $("#refresh-overlay").remove(), $(b).append(f), $("#refresh-overlay").fadeIn("fast"), setTimeout(function() {
            $("#refresh-overlay").fadeOut("fast"), $(".glyph-icon", this).removeClass("icon-spin")
        }, 1500)
    })
}), $(function() {
    "use strict";
    $('a[href="#"]').click(function(a) {
        a.preventDefault()
    })
}), $(function() {
    "use strict";
    $(".todo-box li input").on("click", function() {
        $(this).parent().toggleClass("todo-done")
    })
}), $(function() {
    "use strict";
    var a = 0;
    $(".timeline-scroll .tl-row").each(function(b, c) {
        var d = $(c);
        a += d.outerWidth() + parseInt(d.css("margin-left"), 10) + parseInt(d.css("margin-right"), 10)
    }), $(".timeline-horizontal", this).width(a)
}), $(function() {
    "use strict";
    $(".input-switch-alt").simpleCheckbox()
}), $(function() {
    "use strict";
    $(".scrollable-slim").slimScroll({
        color: "#8da0aa",
        size: "10px",
        alwaysVisible: !0
    })
}), $(function() {
    "use strict";
    $(".scrollable-slim-sidebar").slimScroll({
        color: "#8da0aa",
        size: "10px",
        height: "100%",
        alwaysVisible: !0
    })
}), $(function() {
    "use strict";
    $(".scrollable-slim-box").slimScroll({
        color: "#8da0aa",
        size: "6px",
        alwaysVisible: !1
    })
}), $(function() {
    "use strict";
    $(".loading-button").click(function() {
        var a = $(this);
        a.button("loading")
    })
}), $(function() {
    "use strict";
    $(".tooltip-button").tooltip({
        container: "body"
    })
}), $(function() {
    "use strict";
    $(".alert-close-btn").click(function() {
        $(this).parent().addClass("animated fadeOutDown")
    })
}), $(function() {
    "use strict";
    $(".popover-button").popover({
        container: "body",
        html: !0,
        animation: !0,
        content: function() {
            var a = $(this).attr("data-id");
            return $(a).html()
        }
    }).click(function(a) {
        a.preventDefault()
    })
}), $(function() {
    "use strict";
    $(".popover-button-default").popover({
        container: "body",
        html: !0,
        animation: !0
    }).click(function(a) {
        a.preventDefault()
    })
});
var mUIColors = {
    "default": "#3498db",
    gray: "#d6dde2",
    primary: "#00bca4",
    success: "#2ecc71",
    warning: "#e67e22",
    danger: "#e74c3c",
    info: "#3498db"
}, getUIColor = function(a) {
        return mUIColors[a] ? mUIColors[a] : mUIColors["default"]
    };
(new WOW).init(), $(function() {
        var a = $(window).width();
        a > 767 && skrollr.init({
            mobileCheck: function() {
                return !1
            },
            forceHeight: !1,
            smoothScrolling: !0
        })
    }), jQuery(document).ready(function(a) {
        a(function() {
            "use strict";
            a(".sticky-nav").hcSticky({
                top: 50
            })
        })
    }), (new WOW).init(), /Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent || navigator.vendor || window.opera) || skrollr.init({
        forceHeight: !1,
        smoothScrolling: !0
    }), jQuery(document).ready(function(a) {
        a(function() {
            "use strict";
            a(".main-header-fixed .main-header").hcSticky({})
        }), a(function() {
            "use strict";
            a(".sticky-nav").hcSticky({
                top: 50
            })
        }), a(function() {
            "use strict";
            a(".header-nav > li").hover(function() {
                a(this).addClass("sfHover")
            }, function() {
                a(this).removeClass("sfHover")
            })
        }), a(function() {
            "use strict";
            a("#responsive-menu").click(function() {
                a(".main-header ul.main-nav").toggle()
            })
        })
    }), $(document).on("ready", function() {
        $("#theme-switcher-wrapper .switch-toggle").on("click", this, function() {
            var a = $(this).prev().attr("data-toggletarget");
            $("body").toggleClass(a), (a = "closed-sidebar") && $("#close-sidebar .glyph-icon").toggleClass("icon-angle-right").toggleClass("icon-angle-left")
        }), $('.switch-toggle[id="#boxed-layout"]').click(function() {
            $("#boxed-layout").attr("checked") ? $(".boxed-bg-wrapper").slideDown() : $(".boxed-bg-wrapper").slideUp()
        })
    }), $(function() {
        $(".theme-switcher").click(function() {
            $("#theme-options").toggleClass("active")
        })
    }), $(function() {
        $(".set-adminheader-style").click(function() {
            $(".set-adminheader-style").removeClass("active"), $(this).addClass("active");
            var a = $(this).attr("data-header-bg");
            $("#page-header").removeClass(function(a, b) {
                return (b.match(/(^|\s)bg-\S+/g) || []).join(" ")
            }), $("#page-header").removeClass(function(a, b) {
                return (b.match(/(^|\s)font-\S+/g) || []).join(" ")
            }), $("#page-header").addClass(a)
        })
    }), $(function() {
        $(".set-sidebar-style").click(function() {
            $(".set-sidebar-style").removeClass("active"), $(this).addClass("active");
            var a = $(this).attr("data-header-bg");
            $("#page-sidebar").removeClass(function(a, b) {
                return (b.match(/(^|\s)bg-\S+/g) || []).join(" ")
            }), $("#page-sidebar").removeClass(function(a, b) {
                return (b.match(/(^|\s)font-\S+/g) || []).join(" ")
            }), $("#page-sidebar").addClass(a)
        })
    }), $(function() {
        $(".set-background-style").click(function() {
            $(".set-background-style").removeClass("active"), $(this).addClass("active");
            var a = $(this).attr("data-header-bg");
            $("body").removeClass(function(a, b) {
                return (b.match(/(^|\s)pattern-\S+/g) || []).join(" ")
            }), $("body").removeClass(function(a, b) {
                return (b.match(/(^|\s)full-\S+/g) || []).join(" ")
            }), $("body").removeClass(function(a, b) {
                return (b.match(/(^|\s)bg-\S+/g) || []).join(" ")
            }), $("body").removeClass(function(a, b) {
                return (b.match(/(^|\s)fixed-\S+/g) || []).join(" ")
            }), $("body").addClass(a)
        })
    }), $(function() {
        $(".set-header-style").click(function() {
            $(".set-header-style").removeClass("active"), $(this).addClass("active");
            var a = $(this).attr("data-header-bg");
            $(".main-header").removeClass(function(a, b) {
                return (b.match(/(^|\s)bg-\S+/g) || []).join(" ")
            }), $(".main-header").removeClass(function(a, b) {
                return (b.match(/(^|\s)font-\S+/g) || []).join(" ")
            }), $(".main-header").addClass(a)
        })
    }), $(function() {
        $(".set-footer-style").click(function() {
            $(".set-footer-style").removeClass("active"), $(this).addClass("active");
            var a = $(this).attr("data-header-bg");
            $(".main-footer").removeClass(function(a, b) {
                return (b.match(/(^|\s)bg-\S+/g) || []).join(" ")
            }), $(".main-footer").removeClass(function(a, b) {
                return (b.match(/(^|\s)font-\S+/g) || []).join(" ")
            }), $(".main-footer").addClass(a)
        })
    }), $(function() {
        $(".set-topmenu-style").click(function() {
            $(".set-topmenu-style").removeClass("active"), $(this).addClass("active");
            var a = $(this).attr("data-header-bg");
            $(".top-bar").removeClass(function(a, b) {
                return (b.match(/(^|\s)bg-\S+/g) || []).join(" ")
            }), $(".top-bar").removeClass(function(a, b) {
                return (b.match(/(^|\s)font-\S+/g) || []).join(" ")
            }), $(".top-bar").addClass(a)
        })
    }), $(function() {
        $(".scroll-switcher").slimscroll({
            height: "100%",
            color: "rgba(0,0,0,0.3)",
            size: "10px",
            alwaysVisible: !0
        })
    }), $(document).on("ready", function() {
        swither_resizer()
    }), $(window).on("resize", function() {
        swither_resizer()
    });
