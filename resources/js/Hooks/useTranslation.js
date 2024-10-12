import { usePage } from "@inertiajs/vue3";

export default function t(text) {
    const { translation } = usePage().props
    
    return translation[text];
}