!(function (e) {
    var t = {};
    function r(n) {
        if (t[n]) return t[n].exports;
        var a = (t[n] = { i: n, l: !1, exports: {} });
        return e[n].call(a.exports, a, a.exports, r), (a.l = !0), a.exports;
    }
    (r.m = e),
        (r.c = t),
        (r.d = function (e, t, n) {
            r.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: n });
        }),
        (r.r = function (e) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(e, "__esModule", { value: !0 });
        }),
        (r.t = function (e, t) {
            if ((1 & t && (e = r(e)), 8 & t)) return e;
            if (4 & t && "object" == typeof e && e && e.__esModule) return e;
            var n = Object.create(null);
            if ((r.r(n), Object.defineProperty(n, "default", { enumerable: !0, value: e }), 2 & t && "string" != typeof e))
                for (var a in e)
                    r.d(
                        n,
                        a,
                        function (t) {
                            return e[t];
                        }.bind(null, a)
                    );
            return n;
        }),
        (r.n = function (e) {
            var t =
                e && e.__esModule
                    ? function () {
                          return e.default;
                      }
                    : function () {
                          return e;
                      };
            return r.d(t, "a", t), t;
        }),
        (r.o = function (e, t) {
            return Object.prototype.hasOwnProperty.call(e, t);
        }),
        (r.p = "/"),
        r((r.s = 231));
})({
    231: function (e, t, r) {
        e.exports = r(283);
    },
    283: function (e, t, r) {
        "use strict";
        function n(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                (n.enumerable = n.enumerable || !1), (n.configurable = !0), "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n);
            }
        }
        r.r(t);
        var a = (function () {
            function e(t, r) {
                var n = this;
                !(function (e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
                })(this, e),
                    (this.selector = r),
                    ($.jstree.defaults.dnd.touch = !0),
                    ($.jstree.defaults.dnd.copy = !1),
                    this.fetchCategoryTree(),
                    r.on("select_node.jstree", function (e, r) {
                        return t.fetchCategory(r.selected[0]);
                    }),
                    r.on("loaded.jstree", function () {
                        return r.jstree("open_all");
                    }),
                    this.selector.on("move_node.jstree", function (e, t) {
                        n.updateCategoryTree(t);
                    });
            }
            var t, r, a;
            return (
                (t = e),
                (r = [
                    {
                        key: "fetchCategoryTree",
                        value: function () {
                            this.selector.jstree(
                                { core: { data: { url: laroute.route("admin.kategori.tree") }, check_callback: !0 }, plugins: ["dnd"] });
                        },
                    },
                    {
                        key: "updateCategoryTree",
                        value: function (e) {
                            var t = this;
                            this.loading(e.node, !0),
                                $.ajax({
                                    type: "PUT",
                                    url: route("admin.categories.tree.update"),
                                    data: { category_tree: this.getCategoryTree() },
                                    success: (function (e) {
                                        function t(t) {
                                            return e.apply(this, arguments);
                                        }
                                        return (
                                            (t.toString = function () {
                                                return e.toString();
                                            }),
                                            t
                                        );
                                    })(function (r) {
                                        success(r), t.loading(e.node, !1);
                                    }),
                                    error: (function (e) {
                                        function t(t) {
                                            return e.apply(this, arguments);
                                        }
                                        return (
                                            (t.toString = function () {
                                                return e.toString();
                                            }),
                                            t
                                        );
                                    })(function (r) {
                                        error(r.responseJSON.message), t.loading(e.node, !1);
                                    }),
                                });
                        },
                    },
                    {
                        key: "getCategoryTree",
                        value: function () {
                            return this.selector
                                .jstree(!0)
                                .get_json("#", { flat: !0 })
                                .reduce(function (e, t) {
                                    return e.concat({ id: t.id, parent_id: "#" === t.parent ? null : t.parent, position: t.data.position });
                                }, []);
                        },
                    },
                    {
                        key: "loading",
                        value: function (e, t) {
                            var r = this.selector.jstree().get_node(e, !0);
                            t ? $(r).addClass("jstree-loading") : $(r).removeClass("jstree-loading");
                        },
                    },
                ]) && n(t.prototype, r),
                a && n(t, a),
                e
            );
        })();
        function o(e, t) {
            for (var r = 0; r < t.length; r++) {
                var n = t[r];
                (n.enumerable = n.enumerable || !1), (n.configurable = !0), "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n);
            }
        }
        new ((function () {
            function e() {
                !(function (e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
                })(this, e);
                var t = $(".category-tree");
                new a(this, t),
                    this.collapseAll(t),
                    this.expandAll(t),
                    this.addRootCategory(),
                    this.addSubCategory(),
                    $("#category-form").on("submit", this.submit),
                    window.admin.removeSubmitButtonOffsetOn("#image", ".category-details-tab li > a");
            }
            var t, r, n;
            return (
                (t = e),
                (r = [
                    {
                        key: "collapseAll",
                        value: function (e) {
                            $(".collapse-all").on("click", function (t) {
                                t.preventDefault(), e.jstree("close_all");
                            });
                        },
                    },
                    {
                        key: "expandAll",
                        value: function (e) {
                            $(".expand-all").on("click", function (t) {
                                t.preventDefault(), e.jstree("open_all");
                            });
                        },
                    },
                    {
                        key: "addRootCategory",
                        value: function () {
                            var e = this;
                            $(".add-root-category").on("click", function () {
                                e.loading(!0), $(".add-sub-category").addClass("disabled"), $(".category-tree").jstree("deselect_all"), e.clear(), setTimeout(e.loading, 150, !1);
                            });
                        },
                    },
                    {
                        key: "addSubCategory",
                        value: function () {
                            var e = this;
                            $(".add-sub-category").on("click", function () {
                                var t = $(".category-tree").jstree("get_selected")[0];
                                void 0 !== t && (e.clear(), e.loading(!0), window.form.appendHiddenInput("#form-kategori", "parent_id", t), setTimeout(e.loading, 150, !1));
                            });
                        },
                    },
                    {
                        key: "fetchCategory",
                        value: function (e) {
                            var t = this;
                            this.loading(!0),
                                $(".add-sub-category").removeClass("disabled"),
                                $.ajax({
                                    type: "GET",
                                    url: route("admin.categories.show", e),
                                    success: function (e) {
                                        t.update(e), t.loading(!1);
                                    },
                                    error: (function (e) {
                                        function t(t) {
                                            return e.apply(this, arguments);
                                        }
                                        return (
                                            (t.toString = function () {
                                                return e.toString();
                                            }),
                                            t
                                        );
                                    })(function (e) {
                                        error(e.responseJSON.message), t.loading(!1);
                                    }),
                                });
                        },
                    },
                    {
                        key: "update",
                        value: function (e) {
                            window.form.removeErrors(),
                                $(".btn-delete").removeClass("hide"),
                                $(".form-group .help-block").remove(),
                                $("#confirmation-form").attr("action", route("admin.categories.destroy", e.id)),
                                $("#name").val(e.name),
                                $("#slug").val(e.slug),
                                $("#slug-field").removeClass("hide"),
                                $(".category-details-tab .seo-tab").removeClass("hide"),
                                $("#is_searchable").prop("checked", e.is_searchable),
                                $("#is_active").prop("checked", e.is_active),
                                $(".logo .image-holder-wrapper").html(this.categoryImage("logo", e.logo)),
                                $(".banner .image-holder-wrapper").html(this.categoryImage("banner", e.banner)),
                                $('#category-form input[name="parent_id"]').remove();
                        },
                    },
                    {
                        key: "categoryImage",
                        value: function (e, t) {
                            return t.exists
                                ? '\n            <div class="image-holder">\n                <img src="'
                                      .concat(t.path, '">\n                <button type="button" class="btn remove-image" data-input-name="files[')
                                      .concat(e, ']"></button>\n                <input type="hidden" name="files[')
                                      .concat(e, ']" value="')
                                      .concat(t.id, '">\n            </div>\n        ')
                                : this.imagePlaceholder();
                        },
                    },
                    {
                        key: "clear",
                        value: function () {
                            $("#name").val(""),
                                $("#slug").val(""),
                                $("#slug-field").addClass("hide"),
                                $(".category-details-tab .seo-tab").addClass("hide"),
                                $("#is_searchable").prop("checked", !1),
                                $("#is_active").prop("checked", !1),
                                $(".logo .image-holder-wrapper").html(this.imagePlaceholder()),
                                $(".banner .image-holder-wrapper").html(this.imagePlaceholder()),
                                $(".btn-delete").addClass("hide"),
                                $(".form-group .help-block").remove(),
                                $('#category-form input[name="parent_id"]').remove(),
                                $(".general-information-tab a").click();
                        },
                    },
                    {
                        key: "imagePlaceholder",
                        value: function () {
                            return '\n            <div class="image-holder placeholder">\n                <i class="fa fa-picture-o"></i>\n            </div>\n        ';
                        },
                    },
                    {
                        key: "loading",
                        value: function (e) {
                            !0 === e ? $(".overlay.loader").removeClass("hide") : $(".overlay.loader").addClass("hide");
                        },
                    },
                    {
                        key: "submit",
                        value: function (e) {
                            var t = $(".category-tree").jstree("get_selected")[0];
                            $("#slug-field").hasClass("hide") || (window.form.appendHiddenInput("#category-form", "_method", "put"), $("#category-form").attr("action", route("admin.categories.update", t))), e.currentTarget.submit();
                        },
                    },
                ]) && o(t.prototype, r),
                n && o(t, n),
                e
            );
        })())();
    },
});