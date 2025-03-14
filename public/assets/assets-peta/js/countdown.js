! function (e) {
    e.fn.countdown = function (t, n) {
        var o = e.extend({
            date: null,
            offset: null,
            day: "Day",
            days: "Days",
            hour: "Hour",
            hours: "Hours",
            minute: "Minute",
            minutes: "Minutes",
            second: "Second",
            seconds: "Seconds"
        }, t);
        o.date || e.error("Date is not defined."), Date.parse(o.date) || e.error("Incorrect date format, it should look like this, 12/24/2012 12:00:00.");
        var r = this,
            i = function () {
                var e = new Date,
                    t = e.getTime() + 6e4 * e.getTimezoneOffset();
                return new Date(t + 36e5 * o.offset)
            };
        var s = setInterval(function () {
            var e = new Date(o.date) - i();
            if (e < 0) return clearInterval(s), void(n && "function" == typeof n && n());
            var t = 36e5,
                a = Math.floor(e / 864e5),
                d = Math.floor(e % 864e5 / t),
                f = Math.floor(e % t / 6e4),
                u = Math.floor(e % 6e4 / 1e3),
                l = 1 === a ? o.day : o.days,
                c = 1 === d ? o.hour : o.hours,
                h = 1 === f ? o.minute : o.minutes,
                x = 1 === u ? o.second : o.seconds;
            a = String(a).length >= 2 ? a : "0" + a, d = String(d).length >= 2 ? d : "0" + d, f = String(f).length >= 2 ? f : "0" + f, u = String(u).length >= 2 ? u : "0" + u, r.find(".days").text(a), r.find(".hours").text(d), r.find(".minutes").text(f), r.find(".seconds").text(u), r.find(".days_text").text(l), r.find(".hours_text").text(c), r.find(".minutes_text").text(h), r.find(".seconds_text").text(x)
        }, 1e3)
    }
}(jQuery);
