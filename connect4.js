const game = {
  reset(onchange) {
      this.columns = Array.from({length:7}, () => Array(6).fill(0)); // 2D array
      this.moveCount = 0;
      (this.onchange = onchange)(-1); // callback that can be used for rendering
  },
  drop(column) {
      let i = this.columns[column].indexOf(0);
      if (i < 0 || this.result() >= 0) return; // cannot move here
      this.columns[column][i] = this.moveCount++ % 2 + 1;
      this.onchange(this.result());
  },
  result() { // 0=draw, 1=yellow wins, 2=red wins, -1=undecided
      return +this.columns.map(col => col.join("")).join()
                  .match(/([12])(\1{3}|(.{5}\1){3}|(.{6}\1){3}|((.{7}\1){3}))/)?.[1]
          || -(this.moveCount < 42);
  }
};

// I/O handling
const container = document.querySelector("#container");
const display = result =>
  container.innerHTML = "<table>" + game.columns[0].map((_, rowNo) =>
          "<tr>" + game.columns.map(column => 
              `<td class="${['', 'yellow', 'red'][column[5-rowNo]]}"><\/td>`
          ).join("") + "</tr>"
      ).join("") + 
      `<\/table><out class="${["nobody", "yellow", "red"][result]??""}"><\/out>`;
container.addEventListener("click", e => 
  e.target.tagName == "TD"  ? game.drop(e.target.cellIndex) 
: e.target.tagName == "OUT" ? game.reset(display) : null
);
game.reset(display);