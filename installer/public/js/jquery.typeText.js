(function($) {
  return $.fn.typeText = function() {
    var addString, defaultOptions, options;
    if (arguments.length === 1) {
      if (typeof arguments[0] === "string") {
        addString = arguments[0];
        options = {};
      } else {
        options = arguments[0];
      }
    } else if (arguments.length === 2) {
      addString = arguments[0];
      options = arguments[1];
    } else {
      throw "improper number of args";
    }
    defaultOptions = {
      typeSpeed: 50,
      lineWait: 1000,
      then: function() {}
    };
    options = $.extend(defaultOptions, options);
    return this.each(function() {
      var _el, addToFinishedQueue, afterHandlers, currentEl, index, init, lineIndex, onTick, printLine, printedString, setString, stringArray, triggerFinished, typeInterval, wholeString;
      _el = $(this);
      stringArray = [];
      wholeString = printedString = "";
      index = lineIndex = 0;
      typeInterval = currentEl = null;
      afterHandlers = [];
      setString = (function(_this) {
        return function(newString) {
          if (newString == null) {
            newString = null;
          }
          if (!newString) {
            newString = printedString;
          }
          return currentEl.text(newString);
        };
      })(this);
      onTick = (function(_this) {
        return function() {
          if (index < wholeString.length) {
            printedString += wholeString[index++];
            return setString();
          } else {
            setString(wholeString);
            clearInterval(typeInterval);
            if (lineIndex < stringArray.length) {
              return setTimeout(function() {
                currentEl.removeClass("printing");
                currentEl = $(_this).children().eq(lineIndex);
                return printLine(stringArray[lineIndex++]);
              }, options.lineWait);
            } else {
              return triggerFinished();
            }
          }
        };
      })(this);
      printLine = function(printString) {
        wholeString = printString;
        printedString = "";
        index = 0;
        currentEl.addClass("printing");
        return typeInterval = setInterval(onTick, options.typeSpeed);
      };
      addToFinishedQueue = function(cb) {
        return afterHandlers.push(cb);
      };
      triggerFinished = function() {
        var handler, i, len, results;
        currentEl.removeClass("printing");
        results = [];
        for (i = 0, len = afterHandlers.length; i < len; i++) {
          handler = afterHandlers[i];
          results.push(handler.apply(_el));
        }
        return results;
      };
      init = function() {
        var newParagraph;
        addToFinishedQueue(options.then);
        if (addString) {
          newParagraph = $("<p></p>");
          stringArray.push(addString);
          _el.append(newParagraph);
          currentEl = newParagraph;
        } else {
          _el.children().each(function() {
            stringArray.push($(this).text());
            return $(this).text("");
          });
          currentEl = _el.children().eq(lineIndex);
        }
        return printLine(stringArray[lineIndex++]);
      };
      init();
      return this;
    });
  };
})(jQuery);
