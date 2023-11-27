"use strict";

function resetModal() {
  const modals = document.querySelectorAll(".modal");
  modals.forEach((modal) =>
    modal
      .querySelectorAll(".form-control")
      .forEach((input) => (input.value = ""))
  );
  modals[0].querySelector("#query").value = "add";
  modals[0].querySelector("#input_id").value = "";
}

document
  .querySelectorAll(".modal_btn")
  .forEach((btn) => btn.addEventListener("click", resetModal));

function showUpdateModal(e) {
  const tds = e.currentTarget.closest("tr").querySelectorAll("td");
  const targetId = e.currentTarget.dataset["bsTarget"];
  const inputs = document
    .querySelector(targetId)
    .querySelectorAll(".form-control");

  if (document.querySelector("table th").textContent == "Project Id") {
    inputs[0].value = tds[0].textContent;
    inputs[1].value = tds[2].textContent;
    document.querySelector(targetId).querySelector("#input_id2").value =
      tds[2].textContent;
  } else {
    for (let i = 0; i < tds.length - 2; i++) {
      inputs[i].value = tds[i + 1].textContent;
    }
  }
  document.querySelector(targetId).querySelector("#query").value = "update";
  document.querySelector(targetId).querySelector("#input_id").value =
    tds[0].textContent;
}

function showDeleteModal(e) {
  const tds = e.currentTarget.closest("tr").querySelectorAll("td");
  document
    .querySelector(e.currentTarget.dataset["bsTarget"])
    .querySelector("#input_id").value = tds[0].textContent;
  if (document.querySelector("table th").textContent == "Project Id")
    document
      .querySelector(e.currentTarget.dataset["bsTarget"])
      .querySelector("#input_id2").value = tds[2].textContent;
}

const addActive = (arr, target) => {
  arr.forEach((li) => li.classList.remove("active"));
  target.classList.add("active");
};

const showData = (pageNum) => {
  const activeTrs = document.querySelectorAll(".active_tr");
  const emptyTrs = document.querySelectorAll(".empty_tr");

  // Hide all rows :
  activeTrs.forEach((td) => td.classList.add("hidden"));
  emptyTrs.forEach((td) => td.classList.add("hidden"));

  //
  for (let i = 1; i <= activeTrs.length; i++) {
    if (i > (pageNum - 1) * 5 && i <= pageNum * 5) {
      activeTrs[i - 1]?.classList.remove("hidden");
      emptyTrs[i - 1]?.classList.remove("hidden");
    }
  }
};

const findActive = (arr) =>
  arr.findIndex((item) => item.classList.contains("active"));

function handlePagination(e) {
  const li = e.currentTarget.querySelectorAll(".pageNum");
  let target;

  if (e.target.getAttribute("id") === "prev") {
    if (!li[0].classList.contains("active"))
      target = li[findActive([...li]) - 1];
  } else if (e.target.getAttribute("id") === "next") {
    if (![...li].slice(-1)[0].classList.contains("active"))
      target = li[findActive([...li]) + 1];
  } else {
    if (!e.target.classList.contains("active")) target = e.target;
  }

  if (target) {
    // Change active class to current page number :
    addActive(li, target);

    // Change Data in the table :
    showData(target.textContent);
  }
}
