(() => {
    var e = document.getElementById("multiselect-basic");
    e && multi(e, { enable_search: !1 });
    var t = document.getElementById("multiselect-header");
    t && multi(t);

    var tt = document.getElementById("multiselect-header-two");
    tt && multi(tt);

    var a = document.getElementById("multiselect-optiongroup");
    a && multi(a, { enable_search: !0 });
    var n = new autoComplete({ selector: "#autoCompleteFruit", placeHolder: "Search for Fruits...", data: { src: ["Apple", "Banana", "Blueberry", "Cherry", "Coconut", "Kiwi", "Lemon", "Lime", "Mango", "Orange"], cache: !0 }, resultsList: { element: function (e, t) { if (!t.results.length) { var a = document.createElement("div"); a.setAttribute("class", "no_result"), a.innerHTML = '<span>Found No Results for "' + t.query + '"</span>', e.prepend(a) } }, noResults: !0 }, resultItem: { highlight: !0 }, events: { input: { selection: function (e) { var t = e.detail.selection.value; n.input.value = t } } } }), l = new autoComplete({ selector: "#autoCompleteCars", placeHolder: "Search for Cars...", data: { src: ["Chevrolet", "Fiat", "Ford", "Honda", "Hyundai", "Hyundai", "Kia", "Mahindra", "Maruti", "Mitsubishi", "MG", "Nissan", "Renault", "Skoda", "Tata", "Toyato", "Volkswagen"], cache: !0 }, resultsList: { element: function (e, t) { if (!t.results.length) { var a = document.createElement("div"); a.setAttribute("class", "no_result"), a.innerHTML = '<span>Found No Results for "' + t.query + '"</span>', e.prepend(a) } }, noResults: !0 }, resultItem: { highlight: !0 }, events: { input: { selection: function (e) { var t = e.detail.selection.value; l.input.value = t } } } })
})();