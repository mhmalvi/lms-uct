export default function IsLoading() {
    const start = () => {
        window.document.getElementById("app").classList.add("action");
        window.document
            .getElementById("action-loading")
            .classList.remove("d-none");
    };

    const stop = () => {
        window.document.getElementById("app").classList.remove("action");
        window.document
            .getElementById("action-loading")
            .classList.add("d-none");
    };
    return {
        start,
        stop,
    };
}
