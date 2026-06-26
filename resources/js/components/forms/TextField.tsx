import {Input} from "@/components/ui/input";
import {Label} from "@/components/ui/label";
import InputError from "@/components/input-error";

interface TextFieldProps {
    label: string;
    name: string;
    value: string;
    error?: string;

    type?: React.HTMLInputTypeAttribute;

    placeholder?: string;

    required?: boolean;

    disabled?: boolean;

    autoComplete?: string;

    onChange: (e: React.ChangeEvent<HTMLInputElement>) =>void;
}

export default function TextField({
    label, 
    name,
    value, 
    error,
    type = "text",
    placeholder,
    required = false,
    disabled = false,
    autoComplete,
    onChange,
}: TextFieldProps){
    return(
        <div className="space-y-2">
            <Label htmlFor={name}>
                {label}
                {required &&(
                    <span className="text-destructive ml-1">
                        *
                    </span>
                )}
            </Label>
            <Input
                id={name}
                name={name}
                type={type}
                value={value}
                placeholder={placeholder}
                autoComplete={autoComplete}
                disabled={disabled}
                onChange={onChange}
            />
            <InputError message ={error}/>
        </div>
    );
}