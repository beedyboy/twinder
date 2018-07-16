# typeText([String], [Object])
# ----
# @param printString [String] when the first paramater is a string,
#   it will be appended to the element instead of printing its contents
# @param options [Object] options for typing the text
# @option lineWait [Number] how long to wait at a new line in ms
# @option typeSpeed [Number] delay before typing a new character in ms
# @option then [Function] a function to execute when it's done typing

(($) ->
  
  $.fn.typeText = ->
    
    # process args
    if arguments.length is 1
      if typeof(arguments[0]) is "string"
        addString = arguments[0]
        options = {}
      else
        options = arguments[0]
    else if arguments.length is 2
      addString = arguments[0]
      options = arguments[1]
    else
      throw new Error "incorrect number of args for typeText"
    
    # default options if necessary
    defaultOptions =
      typeSpeed : 50
      lineWait : 1000
      then: ->

    # extended options
    options = $.extend defaultOptions, options
    
    # for each element in the selection
    this.each ->
      
      # store a reference to the jQuery element
      _el = $(this)
      
      stringArray = []
      wholeString = printedString = ""
      index = lineIndex = 0
      typeInterval = currentEl = null
      afterHandlers = []

      # sets the elements HTML value
      # cursor blinks every 3rd character while it's printing
      setString = (newString = null) =>
        unless newString
          newString = printedString
        currentEl.text newString

      # appends a character on the printed string
      # for every tick. Clears the timer and triggers
      # any callbacks when finished
      onTick = =>
        if index < wholeString.length
          # add a character to the string
          printedString += wholeString[index++]
          setString()
        else
          # finished printing the string, 
          # clean up and print the next line
          setString wholeString
          clearInterval typeInterval
          
          if lineIndex < stringArray.length
            # print the next line
            setTimeout =>
              currentEl.removeClass "printing"
              currentEl = $(this).children().eq lineIndex
              printLine stringArray[lineIndex++]
            , options.lineWait
            
          else
            # trigger any callbacks
            triggerFinished()

      # prints a line of text
      printLine = (printString) ->
        wholeString = printString
        printedString = ""
        index = 0
        # printing class adds the cursor
        currentEl.addClass "printing"
        typeInterval = setInterval onTick, options.typeSpeed

      # adds a function to the callback queue
      addToFinishedQueue = (cb) ->
        afterHandlers.push cb

      # executes the callback functions
      triggerFinished = ->
        currentEl.removeClass "printing"
        for handler in afterHandlers
          handler.apply _el

      init = ->
        # add the callback to the queue
        addToFinishedQueue options.then
        
        if addString
          # we are adding a new string
          # append a paragraph
          newParagraph = $("<p></p>")
          stringArray.push addString
          _el.append newParagraph
          currentEl = newParagraph
        else
          # we are printing the child elements
          # store all of the text of child elements
          _el.children().each ->
            stringArray.push $(this).text()
            $(this).text ""
          # store the current element and print the text
          currentEl = _el.children().eq lineIndex
        printLine stringArray[lineIndex++]

      init()

      return this
 
) jQuery
