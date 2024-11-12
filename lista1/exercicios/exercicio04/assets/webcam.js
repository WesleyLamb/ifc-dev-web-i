async function userHasWebcam() {
    const md = navigator.mediaDevices;
    if (!md || !md.enumerateDevices)
        return false;
    return md.enumerateDevices().then((devices) => {
        devices.some((device) => {
            device.kind == 'videoinput'
        });
    })
}