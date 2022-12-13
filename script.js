$(() => {
  //Filling top-row with alphabets
  let topRowColumn = "";
  for (let i = 0; i < 26; i++) {
    topRowColumn += `<div class='grid-cell grid-col-top ${String.fromCharCode(
      65 + i
    )}'>${String.fromCharCode(65 + i)}</div>`;
  }
  $(".top-row").append(topRowColumn);

  //Filling Left-Col with numbers
  let leftColBox = "";
  for (let i = 0; i < 100; i++) {
    leftColBox += `<div class='grid-left-col'>${i + 1}</div>`;
  }
  $(".left-col").append(leftColBox);

  //Adding grid-cells in MainSheet
  for (let i = 0; i < 100; i++) {
    let row_cells = "<div class='grid-row'>";
    for (let j = 0; j < 26; j++) {
      row_cells += `<div contentEditable='true' class='grid-cell ${
        String.fromCharCode(65 + j) + String(i + 1)
      }'></div>`;
    }
    row_cells += "</div>";
    $(".main-sheet").append(row_cells);
  }
  const funct =[
    "SUM",
    "MINUS",
    "MULTIPLY",
    "DIVIDE",
    "AVG",
    "MIN",
    "MAX",
    "COUNT",
    "CONCAT",
    "EQ"
  ]
  
  
  funct.forEach(e=>  $('.dropdown-menu').append(`<button class="dropdown-item" onClick="functionCall('${e}')" type="button">${e}</button>`)  )
  
  //add active cell to MainSheet
  $(".A1").addClass("grid-cell__active");

  //Auto Focus to gridcell
  $(".grid-cell__active").focus();

  //click event listener to grid-cell
  $(".grid-row .grid-cell").on("click", (event) => {
    $("div").removeClass("grid-cell__active");
    console.log(event.target);
    $(event.target).addClass("grid-cell__active");
    const gridCellVal = $(".grid-cell__active").html();
    const inputVal = $("input#text-input").val();
    if (inputVal !== gridCellVal) {
      $("input#text-input").val(gridCellVal);
    }
    $(".grid-cell__class").html(event.target.classList[1]);
  });

  //Observer for resizing column
  const observer = new ResizeObserver((e) => {
    const width = e[0].contentBoxSize[0].inlineSize;
    const cls = e[0].target.classList[2];
    $(`div[class*='${cls}']`).css({ width: width });
  });
  document.querySelectorAll(".top-row .grid-cell").forEach((box) => {
    observer.observe(box);
  });

  $(".grid-cell")
    .keypress((e) => {
      //KeyPress in Grid Cell
      const val = $("input#text-input").val();
      $("input#text-input").val(val + String.fromCharCode(e.keyCode));
    })
    .keydown((e) => {
      const clsName = e.currentTarget.classList[1];

      //Moving active cell with arrows
      if (!e.shiftKey && e.keyCode == 37) {
        //left arrow
        if (clsName[0] != "A") {
          $("div").removeClass("grid-cell__active");
          $(
            `.${String.fromCharCode(clsName.charCodeAt(0) - 1)}${clsName.slice(
              1,
              clsName.length
            )}`
          )
            .addClass("grid-cell__active")
            .focus();
            $('.grid-cell__class').html($('.grid-cell__active')[0].classList[1])
            $('input#text-input').val($('.grid-cell__active').html())
        }
      } else if (!e.shiftKey && e.keyCode == 38) {
        //up arrow
        if (clsName.slice(1, clsName.length) != "1") {
          $("div").removeClass("grid-cell__active");
          $(`.${clsName[0]}${Number(clsName.slice(1, clsName.length)) - 1}`)
            .addClass("grid-cell__active")
            .focus();
            $('.grid-cell__class').html($('.grid-cell__active')[0].classList[1])
            $('input#text-input').val($('.grid-cell__active').html())
        }
      } else if (!e.shiftKey && e.keyCode == 39) {
        //right arrow
        if (clsName[0] != "Z") {
          $("div").removeClass("grid-cell__active");
          $(
            `.${String.fromCharCode(clsName.charCodeAt(0) + 1)}${clsName.slice(
              1,
              clsName.length
            )}`
          )
            .addClass("grid-cell__active")
            .focus();
            $('.grid-cell__class').html($('.grid-cell__active')[0].classList[1])
            $('input#text-input').val($('.grid-cell__active').html())
        }
      } else if (!e.shiftKey && e.keyCode == 40) {
        //down arrow
        if (clsName.slice(1, clsName.length) != "100") {
          $("div").removeClass("grid-cell__active");
          $(`.${clsName[0]}${Number(clsName.slice(1, clsName.length)) + 1}`)
            .addClass("grid-cell__active")
            .focus();
            $('.grid-cell__class').html($('.grid-cell__active')[0].classList[1])
            $('input#text-input').val($('.grid-cell__active').html())
        }
      }

      // Multi grid-cell__active Setting
      if (e.shiftKey && e.keyCode == 39) {
        //Shift+Right Arrow
        const li = $(".grid-cell__active");
        const alpha = li[li.length - 1].classList[1][0];
        const num = li[li.length - 1].classList[1].slice(1,li[li.length-1].classList[1].length);
        if (num == li[0].classList[1].slice(1,li[li.length-1].classList[1].length))
          $(`.${String.fromCharCode(alpha.charCodeAt(0) + 1)}${num}`).addClass(
            "grid-cell__active"
          );
        const newCls = $(".grid-cell__active");
        const startCell = newCls[0].classList[1];
        const endCell = newCls[newCls.length - 1].classList[1];
        $(".grid-cell__class").html(`${startCell}:${endCell}`);
      } else if (e.shiftKey && e.keyCode == 40) {
        //SHIFT+DOWN ARROW
        const li = $(".grid-cell__active");
        const alpha = li[li.length - 1].classList[1][0];
        const num = li[li.length - 1].classList[1].slice(
          1,
          li[li.length - 1].classList[1].length
        );
        if (alpha === li[0].classList[1][0])
          $(`.${alpha}${Number(num) + 1}`).addClass("grid-cell__active");
        const newCls = $(".grid-cell__active");
        const startCell = newCls[0].classList[1];
        const endCell = newCls[newCls.length - 1].classList[1];
        $(".grid-cell__class").html(`${startCell}:${endCell}`);
      } else if (e.shiftKey && e.keyCode == 37) {
        //Shift+left
        const li = $(".grid-cell__active");
        if (li.length == 1) return;

        const cls = li[li.length - 1].classList[1];
        if (cls[1] == li[0].classList[1][1])
          $(`.${cls}`).removeClass("grid-cell__active");
        const newCls = $(".grid-cell__active");
        const startCell = newCls[0].classList[1];
        const endCell = newCls[newCls.length - 1].classList[1];
        if (startCell === endCell)
          return $(".grid-cell__class").html(startCell);
        $(".grid-cell__class").html(`${startCell}:${endCell}`);
      } else if (e.shiftKey && e.keyCode == 38) {
        //Shift+up
        const li = $(".grid-cell__active");
        if (li.length === 1) {
          return;
        }
        const cls = li[li.length - 1].classList[1];
        if (cls[0] === li[0].classList[1][0])
          $(`.${cls}`).removeClass("grid-cell__active");
        const newCls = $(".grid-cell__active");
        const startCell = newCls[0].classList[1];
        const endCell = newCls[newCls.length - 1].classList[1];
        if (startCell === endCell)
          return $(".grid-cell__class").html(startCell);
        $(".grid-cell__class").html(`${startCell}:${endCell}`);
      }
      if (e.keyCode == 8) {
        const val = $("input#text-input").val();
        $("input#text-input").val(val.slice(0, val.length - 1));
      }
      if (e.keyCode == 13) {
        const val = $("input#text-input").val();
        evaluate(val);
      }
    });
});


function functionCall (typeCall) {
  $('input#text-input').val(`=${typeCall}(${$(".grid-cell__class").html()})`)
  evaluate(`=${typeCall}(${$(".grid-cell__class").html()})`)
}

function enterKeyPressed(event) {
  // if($("input#text-input").val()[0]!=='='){
  //   $("input#text-input").attr("autocomplete","off");
  // }
  // if($("input#text-input").val()[0]==='='){
  //   var src = {
  //     SUM: 1,
  //     SUBSTRACT: 2,
  //     MULTIPLY: 3,
  //     DIVIDE: 4,
  //   };
  //   $("input#text-input").autocomplete({
  //     source: src,
  //     treshold:1
  //   });
  // }
  const expression = {
    rawCalcu: /^=\d+[+\-*/]\d+$/g,
  };
  // if($("input#text-input").val()[0]==='=')
  //   wordCheck();
  if (event.keyCode == 13) {
    const val = $("input#text-input").val();
    if (val[0] !== "=") $(".grid-cell__active").html($("#text-input").val());
    // console.log(event,'Enter key pressed',$("input#text-input").val());
    else {
      evaluate(val);
      if (expression["rawCalcu"].test(val)) {
        console.log("Raw Calculation");
      }
    }
  }
  return true;
}

function wordCheck() {
  const expression = {
    SUM: /sum/gi,
    MULTIPLY: /multiply/gi,
    DIVIDE: /divide/gi,
    MINUS: /minus/gi,
  };
  let val = $("input#text-input").val();
  for (e in expression) {
    // console.log(expression[e].test(val))
    // const alpha =/[a-z]/g;
    // val=val.replace(alpha,val.match(alpha)[0])
    if (expression[e].test(val)) {
      val = val.replace(expression[e], `${e}`);
      // console.log(val)
      $("input#text-input").val(val);
      return;
    }
  }
}
const evaluate = (value) => {
  console.log(value)
  const funct = {
    SUM: (val) => {
      let sum = val.reduce((a, b) => Number(a) + Number(b), 0);
      return sum;
    },
    MINUS: (val) => {
      let minus = val.reduce((a, b) => Number(a) - Number(b), 0);
      return minus;
    },
    MULTIPLY: (val) => {
      let mul = val.reduce((a, b) => Number(a) * Number(b), 1);
      return mul;
    },
    DIVIDE: (val) => {
      let div = val.reduce((a, b) => Number(a) / Number(b), 1);
      return div;
    },
    MAX: (val) => {
      const max = val.reduce(
        (a, b) => Math.max(Number(a), Number(b)),
        -Infinity
      );
      return max;
    },
    MIN: (val) => {
      const min = val.reduce(
        (a, b) => Math.min(Number(a), Number(b)),
        +Infinity
      );
      return min;
    },
    AVG: (val) => {
      const avg = val.reduce((a, b) => Number(a) + Number(b), 0) / val.length;
      return avg;
    },
    COUNT: (val) => {
      const count = val.length;
      return count;
    },
    EQ: (val) => {
      return val[0] == val[1] ? "True" : "False";
    },
    CONCAT: (val) => {
      const con = val.reduce((a, b) => a + b, "");
      return con;
    },
  };
  let index = value.indexOf("(");
  const oper = value.slice(1, index);
  let end = value.indexOf(")");
  const limit = value.slice(index + 1, end);
  const alpha = limit.match(/[A-Z]/g);
  const num = limit.match(/[0-9]+/g);
  let items = [];
  if (alpha[0] === alpha[1]) {
    for (let i = Number(num[0]); i <= Number(num[1]); i++) {
      items.push($(`.${alpha[0]}${i}`).html());
    }
  } else {
    for (let i = alpha[0].charCodeAt(0); i <= alpha[1].charCodeAt(0); i++) {
      items.push($(`.${String.fromCharCode(i)}${num[0]}`).html());
    }
  }
  const res = funct[oper](items);
  const cls = $(`.grid-cell__active`);
  if (cls.length === 1) {
    cls.html(res);
  } else {
    $('div').removeClass('grid-cell__active')
    const alpha = cls[cls.length - 1].classList[1][0];
    const num = cls[cls.length - 1].classList[1].slice(
      1,
      cls[cls.length - 1].classList[1].length
    );
    if (cls[0].classList[1][0] == cls[1].classList[1][0]) {
      $(`.${alpha}${Number(num) + 1}`).html(res).addClass('grid-cell__active');
    } else {
      $(`.${String.fromCharCode(alpha.charCodeAt(0) + 1)}${num}`).html(res).addClass('grid-cell__active');
    }
  }
};
